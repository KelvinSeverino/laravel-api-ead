<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

/* Traits são pedaços de código que definem propriedades e métodos que podem ser utilizados por diferentes classes */
trait UuidTrait
{
    public static function booted()
    {
        //Toda vez que inserir um novo dado, sera gerado o ID automaticamente
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }
    
}
