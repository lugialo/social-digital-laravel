<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['user_id', 'assunto', 'mensagem'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
