<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body'];

    // Desabilitar a manutenção automática de timestamps
    public $timestamps = false;

    // Definir a tabela associada ao modelo, se necessário
    protected $table = 'posts';

}
