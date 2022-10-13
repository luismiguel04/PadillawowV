<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Exports\pagosgExport;
use App\Models\Pagog;
use App\Models\Cuenta;
use App\Models\Provedor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Yajra\DataTables\Services\DataTable;


use Maatwebsite\Excel\Facades\Excel;


/**
 * Class PagogController
 * @package App\Http\Controllers
 */
class PagogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pagos = Pagog::where('status', '<', 3)->paginate();



        $pagosp = Pagog::where('status', '=', 3)->paginate();

        $pagosc = Pagog::where('status', '=', 4)->paginate();

        return view('pagog.index', compact('pagos', 'pagosp', 'pagosc'))
            ->with('i', (request()->input('page', 1) - 1) * $pagos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pago = new Pagog();
        $user = \Auth::user();
        $pago->user_id = $user->id;
        // $provedores =Provedor::pluck('nombre','id' );
        $provedores = Provedor::all();
        $cuentas = Cuenta::all();

        return view('pagog.create', compact('pago', 'provedores', 'cuentas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pagog::$rules);
        //$pago = new Pago();



        $pago = Pagog::create($request->all());

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



        return redirect()->route('pagogs.index')
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
        $pago = Pagog::find($id);

        return view('pagog.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pagog::find($id);
        $provedores = Provedor::all();
        $cuentas = Cuenta::all();
        return view('pagog.edit', compact('pago', 'provedores', 'cuentas'));
    }

    public function imprimir()
    {
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $pagos = Pagog::where('status', '<', 3)->paginate();
        $i = (request()->input('page', 1) - 1) * $pagos->perPage();


        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('pagog.pdf', compact('pagos', 'i'))
            ->setPaper('a3', 'landscape');


        //return $pdf->download('provedores.pdf');
        return $pdf->stream('pagos grupo padilla.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pagog $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pagog $pagog)
    {
        request()->validate(Pagog::$rules);

        $pagog->update($request->all());
if($pagog->comprobante_path!= null ){
     $comprobante_file = $request->file('comprobante_path');
        $comprobantename = $pagog->comprobante_path->getClientOriginalName();
        $rutafile = time() . $comprobantename;
        \Storage::disk('pagos')->put(
            $rutafile,
            \File::get($comprobante_file)
        );
        $pagog->comprobante_path = $rutafile;
        $rutafile = time() . $comprobantename;
}
        $pagog->save();



        return redirect()->route('pagogs.index')
            ->with('success', 'Pago actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pago = Pagog::find($id);
        if ($pago) {
            $pago->status = 4;
            $pago->update();
            return redirect()->route('pagogs.index')
                ->with('success', 'Pago eliminado exitosamente');
        } else {
            return redirect()->route('pagogs.index')->with(array(
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
        return Excel::download(new pagosgExport, 'pagos grupo padilla.xlsx');
    }
}
