<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Agreement extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
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
        'iva',
        'capital',
        'intereses',
        'administration',
        'dia_fecha_pagos',
        'gastos_cobranzas',
        'total_cuota',
    ];

    protected $casts = [ 
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
}    
           
