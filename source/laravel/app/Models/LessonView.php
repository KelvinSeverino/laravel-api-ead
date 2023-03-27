<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonView extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'user_id', 'qty'];

    /**
     * lesson - gera relacionamento entre tabelas / traz o a aula da visualizacao
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * user - gera relacionamento entre tabelas / traz o user da aula
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
