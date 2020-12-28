<?php

namespace App\Exports\Buildings;

use App\Models\Buildings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;

class BuildingsTemplateExport implements FromCollection, WithHeadings, ShouldAutoSize, WithStyles, WithEvents,WithTitle
{
    private $lenght;
    public function collection()
    {
        $sql = Buildings::join('users', 'buildings.administrator_id', 'users.id')
            ->select('buildings.id_building', 'buildings.name_building', 'buildings.address_building', 'buildings.phone_building', 'users.name')
            ->get();
        $this->lenght = $sql->count() + 2;
        return $sql;
    }
    public function headings(): array
    {
        return [
            ["Listado de Conjuntos"],
            ["Identificador", "Nombre del Conjunto", "Direccion", "Telefono", "Administrador a Cargo"]
        ];
    }
    public function title(): string
    {
        return 'Conjuntos';
    }
    public function styles(Worksheet $sheet)
    {
        return [

            'A1:E1'  => ['merge' => ['bold' => true]],

            'A2:E2' => ['font' => ['bold' => true]],


        ];
    }
    public function RegisterEvents(): array
    {
        return  [

            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->mergeCells('A1:E1')->getStyle('A1:E1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => '02022D'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    


                ]);
                $event->sheet->getStyle('A1:E' . $this->lenght)->applyFromArray([
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
