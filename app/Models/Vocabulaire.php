<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vocabulaire extends Model
{
    use HasFactory;
    
    protected $fillable=['word','definition','quiz'];
}
