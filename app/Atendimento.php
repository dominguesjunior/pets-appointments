<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Atendimento extends Model
{
    protected $fillable = [
        'pet_id', 'data_atendimento', 'descricao'
    ];

    /**
     * @param array $fields
     * @return Atendimento
     */
    public function create(array $fields): Atendimento
    {
        $pet = Pet::find($fields['pet_id']);
        return $pet->atendimentos()->create($fields);
    }

    /**
     * @return BelongsTo
     */
    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }
}
