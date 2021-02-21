<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
