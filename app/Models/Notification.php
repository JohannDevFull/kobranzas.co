<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable=[
        'from',
        'action',
        'notificable',
        'info'
    ];
    protected $cast=[
        'info'=>'array',
        'from'=>'array'
    ];
}
