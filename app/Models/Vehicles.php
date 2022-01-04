<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'placa',
        'user',
    ];

    public function relUser(){
        return $this->hasOne(User::class, 'id', 'user');
    }
}
