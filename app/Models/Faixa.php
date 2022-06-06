<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faixa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'albuns_id',
        'nome_faixa',
        'numero_faixa'
        ];

    public function album()
    {
    return $this->belongsTo('App\Models\Album', 'albuns_id', 'id');
    }
}
