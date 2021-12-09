<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];


    public function musicas()
    {
        return $this->hasMany(Musica::class, 'id_genero', 'id');
    }
    

}
