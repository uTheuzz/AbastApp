<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abastecimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_veiculo',
        'id_usuario',
        'dt_abastecimento',
        'km_atual',
        'valor',
        'qtd_litros',
        'valor_por_litro',
        'latitude',
        'longitude',
        'endereco'
    ];

    public function relVehicles(){
        return $this->hasOne(Vehicles::class, 'id', 'id_veiculo');
    }

    public function relUser(){
        return $this->hasOne(User::class, 'id', 'id_usuario');
    }
}

