<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model {
    protected $fillable = [
        'nombre',
        'apellidos', 
        'telefono',
        'correo',
        'fecha_nacimiento',
        'nota_media',
        'experiencia',
        'formacion',
        'habilidades',
        'fotografia',
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'nota_media' => 'decimal:2',
    ];

    public function getFotografiaUrl() {
        $url = url('assets/img/noalumno.png');
        if($this->fotografia != null) {
            $url = url('storage/' . $this->fotografia);
        }
        return $url;
    }

    public function getEdad() {
        return $this->fecha_nacimiento->age;
    }

    public function getNombreCompleto() {
        return $this->nombre . ' ' . $this->apellidos;
    }
}