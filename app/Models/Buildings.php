<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address' , 
        'phone_building',
        'administrator_id',
    ];
}
