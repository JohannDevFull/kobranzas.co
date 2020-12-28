<?php

namespace App\Exports\Buildings;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Template implements WithTitle,WithHeadings,WithStyles,ShouldAutoSize
{
    public function headings(): array
    {
        return [
            ["Nombre", "Correo", "Tipo de Documento", "Documento", "Telefono", "Segundo Telefono", "Contraseña", "Código del Cliente", "Número de Contrato", 'Identificador de Estado', "Identificador de Conjunto"],
          
        ];
    }
    public function title(): string
    {
        return 'Formato Clientes';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            'A1:K1' => ['font' => ['bold' => true]],
        ];
    }

}
