<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Clients extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $primaryKey = 'id_client';

    protected $fillable = [
        'client_code',
        'contract_number',
        'state_id',
        'user_id',
        'building_id',
    ];
    

}
