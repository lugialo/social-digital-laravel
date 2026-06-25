<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    protected $fillable = [
        'user_id',
        'velocidade',
        'usabilidade',
        'design',
        'atendimento',
        'geral',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media(): float
    {
        return ($this->velocidade + $this->usabilidade + $this->design + $this->atendimento + $this->geral) / 5;
    }
}
