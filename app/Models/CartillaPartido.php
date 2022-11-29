<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartillaPartido extends Model

{
    use HasFactory;

    public $table = 'cartillapartidos';

    public function cartillas() {
        return $this->belongsToMany(Cartilla::class);
    }

    public function partidos() {
        return $this->hasMany(Partido::class);
    }
}
