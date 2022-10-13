<?php

namespace App\Http\Controllers;

use App\Exports\pagosaExport;
use App\Models\Pagoa;
use App\Models\Cuenta;
use App\Models\Provedor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\Services\DataTable;


use Maatwebsite\Excel\Facades\Excel;


/**
 * Class PagoaController
 * @package App\Http\Controllers
 */
class PagoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pagos = Pagoa::where('status', '<', 3)->paginate();



        $pagosp = Pagoa::where('status', '=', 3)->paginate();

        $pagosc = Pagoa::where('status', '=', 4)->paginate();

        return view('pagoa.index', compact('pagos', 'pagosp', 'pagosc'))
            ->with('i', (request()->input('page', 1) - 1) * $pagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago = new Pagoa();
        $user = \Auth::user();
        $pago->user_id = $user->id;
        // $provedores =Provedor::pluck('nombre','id' );
        $provedores = Provedor::all();
        $cuentas = Cuenta::all();

        return view('pagoa.create', compact('pago', 'provedores', 'cuentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pagoa::$rules);
        //$pago = new Pago();



        $pago = Pagoa::create($request->all());

        $pago_file = $request->file('pago_path');
        $pagoname = $pago->pago_path->getClientOriginalName();
        $rutafile = time() . $pagoname;
        \Storage::disk('pagos')->put(
            $rutafile,
            \File::get($pago_file)
        );
        $pago->pago_path = $rutafile;
        $rutafile = time() . $pagoname;



        $solicitud_file = $request->file('solicitud_path');
        $solicitudname = $pago->solicitud_path->getClientOriginalName();
        $rutafile = time() . $solicitudname;
        \Storage::disk('pagos')->put(
            $rutafile,
            \File::get($solicitud_file)
        );
        $pago->solicitud_path = $rutafile;
        $rutafile = time() . $solicitudname;


        $pago->save();



        return redirect()->route('pagoas.index')
            ->with('success', 'Pago creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pago = Pagoa::find($id);

        return view('pagoa.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pagoa::find($id);
        $provedores = Provedor::all();
        $cuentas = Cuenta::all();
        return view('pagoa.edit', compact('pago', 'provedores', 'cuentas'));
    }

    public function imprimir()
    {
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $pagos = Pagoa::where('status', '<', 3)->paginate();
        $i = (request()->input('page', 1) - 1) * $pagos->perPage();


        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('pagoa.pdf', compact('pagos', 'i'))
            ->setPaper('a2', 'landscape');


        //return $pdf->download('provedores.pdf');
        return $pdf->stream('pagos aduocomer.pdf');

 }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pagoa $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagoa $pagoa)
    {
        request()->validate(Pagoa::$rules);

        $pagoa->update($request->all());
if($pagoa->comprobante_path != null){
        $comprobante_file = $request->file('comprobante_path');
        $comprobantename = $pagoa->comprobante_path->getClientOriginalName();
        $rutafile = time() . $comprobantename;
        \Storage::disk('pagos')->put(
            $rutafile,
            \File::get($comprobante_file)
        );
        $pagoa->comprobante_path = $rutafile;
        $rutafile = time() . $comprobantename;
}

       $pagoa->save();

        return redirect()->route('pagoas.index')
            ->with('success', 'Pago actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pago = Pagoa::find($id);
        if ($pago) {
            $pago->status = 4;
            $pago->update();
            return redirect()->route('pagoas.index')
                ->with('success', 'Pago eliminado exitosamente');
        } else {
            return redirect()->route('pagoas.index')->with(array(
                "message" => "El video que trata de eliminar no existe"
            ));
        }
    }

    public function cuentas(Request $request)
    {
        if (isset($request->texto)) {
            $cuentas = Cuenta::whereprovedor_id($request->texto)
		               ->where('status','=', 1)->get();
            return response()->json(
                [
                    'lista' => $cuentas,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }

    public function cuentass(Request $request)
    {
        if (isset($request->texto)) {
            $cuentas = Cuenta::whereprovedor_id($request->texto)
				 ->where('status','=', 1)->get();
            return response()->json(
                [
                    'lista' => $cuentas,
                    'success' => true
                ]
            );
        } else {
            return response()->json(
                [
                    'success' => false
                ]
            );
        }
    }

    public function getPago($filename)
    {
        $file = \storage::disk('pagos')->get($filename);
        return new Response($file, 200);
    }

    public function getSolicitud($filename)
    {
        $file = \storage::disk('pagos')->get($filename);
        return new Response($file, 200);
    }
     public function getComprobante($filename)
    {
        $file = \storage::disk('pagos')->get($filename);
        return new Response($file, 200);
    }

    public function export()
    {
        return Excel::download(new pagosaExport, 'pagos aduocomer.xlsx');
    }
}
