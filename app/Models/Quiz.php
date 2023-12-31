<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    public $table='quizzes';
    protected  $fillable=[
        'score_max',
        'last_score',
        'title',
        'language'
    ];


    public function vocabulaires(){
        return $this->hasMany(Vocabulaire::class,'quiz');
    }
 
}
