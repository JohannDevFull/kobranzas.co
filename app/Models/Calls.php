<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_call';

    protected $fillable = [ 
        'client_id',
        'name_call',
        'phone_call',
        'employee_id',
        'description',
        'state_id',
    ];
}
