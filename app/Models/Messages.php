<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{   protected $fillable = ['message','membre_id','sujet_id'];
    use HasFactory;

    public function sujets(){
        return $this->belongsTo(Sujets::class,'sujet_id','id');
    }

    public function membres(){
        return $this->belongsTo(Membres::class,'membre_id','id');
    }
}
