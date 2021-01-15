<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class State extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    protected $table="state";
    use HasFactory;

    protected $primaryKey = 'id_state';

    protected $fillable = [  
        'description', 
    ];

}
