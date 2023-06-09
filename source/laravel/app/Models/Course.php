<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['nome', 'descricao', 'imagem'];
    
    /**
     * modules - retorna todos os modulos do curso
     */
    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}
