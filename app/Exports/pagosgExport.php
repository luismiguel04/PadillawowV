<?php

namespace App\Exports;

use App\Models\Pagog;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class pagosgExport implements FromView, ShouldAutoSize

{
    public function view(): View
    {
        $pagos = Pagog::where('status', '<', 3)->paginate();
        $i = (request()->input('page', 1) - 1) * $pagos->perPage();
        return view('pagog.excel', [
            'pagos' => Pagog::all()
        ], compact('i'));
    }
}


