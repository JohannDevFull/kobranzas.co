<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pruebas extends Model
{
    use HasFactory;

    public static function pruebaUsuario($value='')
    {
    	$users= User::role('Admin')->get();

        $tamano=sizeof($users);
        for ($i=0; $i < $tamano ; $i++) 
        { 
            // $usuario = User::find($users[$i]->id); 
            // $usuario->assignRole('Cliente'); 
            echo ".....................<br>";
            echo $users[$i]->id;  
            echo $users[$i]->name;  

        }

        print_r($users);
    }
}
