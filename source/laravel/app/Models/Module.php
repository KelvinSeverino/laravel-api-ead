<?php

namespace App\Models;

use App\Models\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory, UuidTrait;
    
    public $incrementing = false;
    protected $keyType = 'uuid';
    protected $fillable = ['nome'];

    /**
     * course - retorna o curso do modulo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
