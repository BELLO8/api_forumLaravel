<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membres extends Model
{
    protected $fillable = ['pseudo'];
    use HasFactory;
    public function messages(){
        return $this->hasMany(Messages::class);
    }
}
