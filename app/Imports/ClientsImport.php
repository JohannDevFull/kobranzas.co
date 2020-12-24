<?php

namespace App\Imports;
 
use App\Models\Clients;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ClientsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            0 => new FirstSheetImport(),
          
        ];
    }
   
}
