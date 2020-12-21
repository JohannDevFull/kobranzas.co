<?php

namespace App\Imports;
 
use App\Models\Clients;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new Clients([
            'client_code'=> $row[0],
            'contract_number'=> $row[1],
            'state_id'=> $row[2],
            'user_id'=> $row[3],
            'building_id'=> $row[4],
        ]);
    }
}
