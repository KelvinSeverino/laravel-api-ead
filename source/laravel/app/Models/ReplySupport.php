<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplySupport extends Model
{
    use HasFactory, UuidTrait;
    
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['status', 'descricao', 'support_id', 'user_id'];
    protected $table = 'reply_support'; //Definindo nome da tabela, pois quando criado pelo Artisan colocou no plural        
    
    /**
     * support - gera relacionamento entre tabelas / traz a chamado do suporte
     *
     * @return void
     */
    public function support()
    {
        return $this->belongsTo(Support::class);
    } 
    
    /**
     * user - gera relacionamento entre tabelas / traz o user do suporte
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }   
}
