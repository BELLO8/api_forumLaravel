<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sujets extends Model
{
    protected $fillable = ['sujets','cate_id'];
    use HasFactory;

    public function categories(){
        return $this->belongsTo(Categorie::class,'cate_id','id');
    }

    public function messages(){
        return $this->hasMany(Messages::class);
    }

}
