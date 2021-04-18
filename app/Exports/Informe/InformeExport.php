<?php

namespace App\Exports\Informe;

use App\Models\Calls;
use App\Models\Buildings;
use App\Models\Permisos;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class InformeExport implements FromCollection,WithHeadings,WithTitle
{
    public function collection()
    {
    	$value = session('conjunto');
        $state = Permisos::reporte($value);
        $collection = collect($state);
        $this->lenght=$collection->count()+1;
        return $collection;
    }

    public function headings(): array
    {
        return [
            ["CODIGO", "NOMBRE","ESTADO","HONORARIOS","FECHA PAGO", "VALOR PAGO","GASTOS COBRANZAS","IVA 19%","SALDO G. COBRANZAS","NOMBRE","SALDO DEUDA",session('conjunto')]
        ];
    }


    public function title(): string
    {
        return 'Informe mes';
    }
}