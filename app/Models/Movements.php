<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movements extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_movement';
    
    protected $fillable = [ 
        'user_id',
        'type_movement_id',
        'valor_movement', 
        'description_movement', 
    ];

    protected $casts = [ 
        'created_at'=>'datetime:Y-m-d H:i:s',
        'updated_at'=>'datetime:Y-m-d H:i:s',
    ];

     
}
