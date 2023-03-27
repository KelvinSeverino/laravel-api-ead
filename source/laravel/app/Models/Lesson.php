<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory, UuidTrait;
    
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['nome', 'descricao', 'video'];
    
    /**
     * supports - gera relacionamento entre tabelas
     *
     * @return void
     */
    public function supports()
    {
        return $this->hasMany(Support::class);
    }
    
    /**
     * views - gera relacionamento entre tabelas / traz as views das aulas do usuario
     */
    public function views()
    {
        return $this->hasMany(LessonView::class)
                    ->where(function ($query) {
                        if(auth()->check()) { //Verifica se o usuario esta autenticado
                            return $query->where('user_id', auth()->user()->id);
                        }
                    });
    }
}
