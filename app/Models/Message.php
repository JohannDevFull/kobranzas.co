<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable =[
        'from',
        'to',
        'text'
    ];
    public function fromContact()
    {
        return $this->hasOne(User::class, 'id', 'from');
    }
}
