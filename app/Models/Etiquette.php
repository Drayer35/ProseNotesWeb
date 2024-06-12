<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquette extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table='etiquettes';

    public function notes(){
        $this->belongsToMany(Note::class);
    }

}
