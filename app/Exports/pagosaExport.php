<?php

namespace App\Exports;


use App\Models\Pagoa;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;



class pagosaExport implements FromView, ShouldAutoSize

{
    public function view(): View
    {
        $pagos = Pagoa::where('status', '<', 3)->paginate();
        $i = (request()->input('page', 1) - 1) * $pagos->perPage();
        return view('pagoa.excel', [
            'pagos' => Pagoa::all()
        ], compact('i'));
    }
}


