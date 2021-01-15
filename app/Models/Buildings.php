<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Buildings extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;

    protected $primaryKey = 'id_building';
    
    protected $fillable = [
        'name_building',
        'address_building' , 
        'phone_building',
        'administrator_id',
    ];

    public function administrator()
    {
        return $this->belongsTo(User::class);
    }

}
