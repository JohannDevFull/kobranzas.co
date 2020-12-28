<?php

namespace App\Exports\Buildings;

use App\Exports\States\StateExport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Spatie\Permission\Exceptions\GuardDoesNotMatch;

class MultiSheetTemplate implements WithMultipleSheets{


    public function sheets(): array
    {
        return[
            'Plantilla'=>new Template,
            'Conjuntos'=>new BuildingsTemplateExport,
            'Estados'=>new StateExport,
            'Ejemplo'=>new ExampleTemplate
        ];
       
        
    }
  
}
