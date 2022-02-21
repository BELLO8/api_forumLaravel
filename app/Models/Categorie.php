<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['categorie'];
    use HasFactory;

    public function sujets(){
        return $this->hasMany(Sujets::class);
    }
}
