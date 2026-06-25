<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membro',
        'data',
        'hora',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'descricao',
        'observacao',
    ];

    protected $casts = [
        'data' => 'date',
    ];

    public function assistente()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function enderecoCompleto(): string
    {
        $parts = array_filter([
            $this->logradouro,
            $this->numero,
            $this->bairro,
            $this->cidade . ' - ' . $this->estado,
        ]);

        return implode(', ', $parts);
    }
}
