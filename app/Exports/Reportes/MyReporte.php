<?php

namespace App\Exports\Reportes;

use App\Exports\States\StateExport;
use App\Models\Permisos;
use App\Models\State;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class MyReporte implements FromCollection,WithStyles,WithEvents,WithHeadings,ShouldAutoSize,WithTitle
{
    private $lenght;

    public function collection()
    {
    
        $state = Permisos::reporte(1);
        $this->lenght=$state->count()+2;
        return $state;
    }


    public function headings(): array
    {
        return [
            ["Reporte general"],
            ["Identificador", "Descripción"]
        ];
    }


    public function title(): string
    {
        return 'Estados de Cliente';
    }


    public function styles(Worksheet $sheet)
    {
        return [

            'A1:B1'  => ['merge' => ['bold' => true]],

            'A2:B2' => ['font' => ['bold' => true]],


        ];
    }


    public function RegisterEvents(): array
    {
        return  [

            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:B1')->getStyle('A1:B1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => '02022D'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],



                ]);
                $event->sheet->getStyle('A1:B' . $this->lenght)->applyFromArray([
                    'font' => [

                        'color' => ['rgb' => '02022D'],
                    ],
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
