<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    use HasFactory;

	public function pais_local(){
        return $this->belongsTo(Pais::class, 'pais_local_id', 'id');
	}

	public function pais_visitante(){
        return $this->belongsTo(Pais::class, 'pais_visitante_id', 'id');
	}
}
