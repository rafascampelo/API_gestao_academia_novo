<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produto';
    protected $primaryKey = 'cod_prod';
    
    // Lista de colunas que o frontend pode enviar
    protected $fillable = [
        'nome_prod',
        
    ];

    // O Laravel assume que as chaves primárias são inteiros, mas não auto-increment
    // para este Model específico, como você já tem dados, vamos garantir que ele saiba
    public $incrementing = true; 
}
