<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Calls extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
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
