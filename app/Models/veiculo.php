<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $table = 'veiculos'; // Especifica el nombre de la tabla

    protected $fillable = [
        'modelo', 'marca', 'ano', 'descricao', 'vendido', 'created_at', 'updated_at'
    ];

}
