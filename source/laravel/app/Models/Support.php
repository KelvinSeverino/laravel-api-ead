<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory, UuidTrait;
    
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['status', 'descricao', 'lesson_id'];

    public $statusOptions = [
        "P" => "Pendente, Aguardando Professor",
        "A" => "Aguardando Aluno",
        "F" => "Finalizado"
    ];
    
    /**
     * user - gera relacionamento entre tabelas / traz o usuario do suporte
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }    
    
    /**
     * lesson - gera relacionamento entre tabelas / traz a aula do suporte
     *
     * @return void
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }   
    
    /**
     * replies - gera relacionamento entre tabelas / traz as repostas do suporte
     *
     * @return void
     */
    public function replies()
    {
        return $this->hasMany(ReplySupport::class);
    }
}
