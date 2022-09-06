<?php

namespace App\Http\Controllers;

use App\Models\Provedor;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;

/**
 * Class ProvedorController
 * @package App\Http\Controllers
 */
class ProvedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provedors = Provedor::paginate();

        return view('provedor.index', compact('provedors'))
            ->with('i', (request()->input('page', 1) - 1) * $provedors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $provedor = new provedor();
        $user = \Auth::user();
        $provedor->user_id = $user->id;
        return view('provedor.create', compact('provedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Provedor::$rules);


        $provedor = new provedor();

        /*   $provedor->nombre =$request->input('nombre');
        $provedor->direccion =$request->input('direccion'); */
        /* 
        $provedor ->save(); */
        $provedor = Provedor::create($request->all());
        return redirect()->route('provedors.index')
            ->with(array(
                'message' => 'El provedor se ha creado correctamente'
            ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provedor = Provedor::find($id);

        return view('provedor.show', compact('provedor'));
    }
    public function imprimir()
    {
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $provedors = Provedor::where('status', '=', 'activo')->paginate();
        $i = (request()->input('page', 1) - 1) * $provedors->perPage();


        $pdf = PDF::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('provedor.pdf', compact('provedors', 'i'))
            ->setPaper('a4', 'landscape');


        //return $pdf->download('provedores.pdf');
        return $pdf->stream('invoice.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provedor = Provedor::find($id);

        return view('provedor.edit', compact('provedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provedor $provedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provedor $provedor)
    {
        request()->validate(Provedor::$rules);

        $provedor->update($request->all());

        return redirect()->route('provedors.index')
            ->with('success', 'Provedor actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $provedor = Provedor::find($id);

        if ($provedor) {
            $provedor->status = 'inactivo';
            $provedor->update();
            return redirect()->route('provedors.index')
                ->with('success', 'provedor eliminado exitosamente');
        } else {
            return redirect()->route('provedors.index')->with(array(
                "message" => "El provedor que trata de eliminar no existe"
            ));
        }
    }
}