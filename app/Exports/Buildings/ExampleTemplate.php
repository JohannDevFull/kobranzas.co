<?php

namespace App\Exports\Buildings;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithValidation;

class ExampleTemplate implements WithHeadings, WithStyles, WithEvents,ShouldAutoSize,WithTitle
{
    public function headings(): array
    {
        return [
            ["Nombre", "Correo", "Tipo de Documento", "Documento", "Telefono", "Segundo Telefono", "Contraseña", "Código del Cliente", "Número de Contrato", 'Identificador de Estado', "Identificador de Conjunto"],
            ["John Doe", "Ejemplo@hotmail.com", "cedula_ciudadania", "1111111111", "3333333333", "3333333330", "12345678", "1234567", "12345678", '1', "1"],
            ["Jane Doe", "Ejemplo@gmail.com", "cedula_extranjeria", "111111112", "3123456789", "1312345678", "98765432", "123451212", "12345666", '2', "3"],

        ];
    }
    public function title(): string
    {
        return 'Ejemplo';
    }
    public function styles(Worksheet $sheet)
    {
        return [
            'A1:K1' => ['font' => ['bold' => true]],
        ];
    }
    public function RegisterEvents(): array
    {
        return  [

            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:K1')->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000'],
                        ],
                    ],
                ]);
            },

        ];
    }

}
