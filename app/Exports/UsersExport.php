<?php

namespace App\Exports;


use App\Models\Pago;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class UsersExport implements FromView, ShouldAutoSize

{
    public function view(): View
    {
        $pagos = Pago::where('status', '<', 3)->paginate();
        $i = (request()->input('page', 1) - 1) * $pagos->perPage();
        return view('pago.excel', [
            'pagos' => Pago::all()
        ], compact('i'));
    }
}