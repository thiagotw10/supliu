<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faixas extends Model
{
    protected $fillable = ['album_id', 'nome_faixa', 'duracao_faixa'];
}
