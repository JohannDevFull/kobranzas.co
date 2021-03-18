<?php

namespace App\Exports\Reportes;


use App\Exports\Reportes\MyReporte;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;

class Reporte implements WithMultipleSheets{


    public function sheets(): array
    {
        return[
            'Clientes'=>new MyReporte, 
        ];
       
        
    }
  
}
