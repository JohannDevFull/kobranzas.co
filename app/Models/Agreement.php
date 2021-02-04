<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agreement extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_agreement';

    protected $fillable = [ 
        'user_id',
        'employee_id',
        'name_employee',
        'state_id',
        'current_debt',
        'credit',
        'quotas',
        'observations',
    ];

    protected $casts = [ 
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
}    
           
