<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    protected $fillable = [
        'nome', 'especie'
    ];

    /**
     * @param $fields
     * @return Pet
     */
    public function create($fields): Pet
    {
        return parent::create([
            "nome" => $fields['nome'],
            "especie" => $fields['especie']
        ]);
    }

    /**
     * @return HasMany
     */
    public function atendimentos(): HasMany
    {
        return $this->hasMany(Atendimento::class);
    }
}
