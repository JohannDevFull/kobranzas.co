<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_building';
    
    protected $fillable = [
        'name_building',
        'address_building' , 
        'phone_building',
        'administrator_id',
    ];

}
