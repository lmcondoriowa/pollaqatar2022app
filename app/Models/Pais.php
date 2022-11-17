<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    public $table = 'paises';

	public function grupo(){
    	// un libro pertenece a un autor
    	return $this->belongsTo(Grupo::class);
	}

}
