<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public $timestamps = true;
   
    protected $fillable = ['id_note', 'image'];

    public function note()
    {
        return $this->belongsTo(Note::class, 'id_note');
    }

}
