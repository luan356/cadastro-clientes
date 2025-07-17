<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
class Cliente extends Model
{

          use HasFactory;

    protected $fillable = [
        'nome_completo',
        'cpf',
        'email',
        'telefone',
        'endereco_id' 
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
