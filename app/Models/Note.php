<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table='notes';

    protected $fillable =['id','id_user','Title','Note','IsArchived','IsFixed','IsFinished'];
    public function images(){
        return $this->hasMany(Image::class,'id_note');
    }


    public function element(){
        return $this->hasMany(Element::class);
    }
}

