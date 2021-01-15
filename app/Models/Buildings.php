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
        'gastos_cobranzas',
        'valor_administracion',
        'administrator_id',
    ];

    public function administrator()
    {
        return $this->belongsTo(User::class);
    }

}
