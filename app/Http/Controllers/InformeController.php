<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\Informe\InformeExport;
use Maatwebsite\Excel\Facades\Excel;

class InformeController extends Controller
{
    // //
    // public function informe() 
    // {
    //     return Excel::download(new InformeExport, 'informe.xlsx');
    // }

    //
    public function informe($id="") 
    {
    	session(['conjunto' =>$id]);
        return Excel::download(new InformeExport, 'informe.xlsx');
    }
}
