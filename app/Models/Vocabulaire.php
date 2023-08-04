<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulaire extends Model
{
    use HasFactory;
    
    protected $fillable=['word','definition','quiz','user'];

    public function quiz(){
        return $this->belongsTo(Quiz::class,'quiz');
    }
    public function user(){
        return $this->belongsTo(User::class,'user');
    }
}
