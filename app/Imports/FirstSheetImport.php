<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Clients;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FirstSheetImport implements ToCollection, WithStartRow, WithValidation
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $user = User::create([
                'name' => $row[0],
                'email' => $row[1],
                'doc_type' => $row[2],
                'document' => $row[3],
                'phone_one' => $row[4],
                'phone_two' => $row[5],

                'password' => Hash::make($row[6]),

            ]);
            
            $userRole = User::find($user->id);
            $userRole->assignRole('Cliente');

            Clients::create([
                'client_code' => $row[7],
                'contract_number' => $row[8],
                'state_id' => $row[9],
                'user_id' => $user->id,
                'building_id' => $row[10],
            ]);
        }
    }
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nombre',
            '1'=>'Correo',
            '2'=>'Tipo de Documento',
            '3'=>'Documento',
            '4'=>'Telefono',
            '5'=>'Segundo Telefono',
            '6'=>'Contraseña',
            '7'=>'Código de Cliente',
            '8'=>'Número de Contrato',
            '9'=>'Identificador de Estado',
            '10'=>'Identificador de Conjunto'
        ];
    }
    public function rules(): array
    {
        return [
            '*.0' => 'required|regex:/^[\pL\s\-]+$/u',
            '*.1' => 'email|unique:users,email',
            '*.2' => 'required',
            '*.3' => 'unique:users,document',
            '*.4' => 'required',
            '*.6' => 'required',
            '*.7' => 'unique:clients,client_code',
            '*.8' => 'unique:clients,contract_number',
            '*.9' => 'required',
            '*.10' => 'required'
        ];
    }
    public function startRow(): int
    {
        return 2;
    }
}
