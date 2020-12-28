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

    protected $casts = [ 
        'created_at'=>'datetime:Y-m-d H:i:s',
        'updated_at'=>'datetime:Y-m-d H:i:s',
    
    ];
}
