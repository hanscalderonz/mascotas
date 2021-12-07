<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascotas extends Model
{
    protected $table = "mascotas"; protected $fillable = ['nombre', 'fecha_nacimiento', 'cedula_cliente']; 
    public function scopeSearch($query, $nombre){
        if($nombre){
            return $query->where('nombre', 'LIKE', "%$nombre%");
        }
    }
}
