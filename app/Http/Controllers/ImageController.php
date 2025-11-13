<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
        public function view($id) {
        $alumno = Alumno::find($id);
        
        if($alumno == null || $alumno->fotografia == null) {
            return $this->getNoPhotoImage();
        }
        
        // BUSCAR IMAGEN EN RUTA DIRECTA
        $imagePath = public_path($alumno->fotografia);
        
        if(file_exists($imagePath)) {
            \Log::info("Imagen encontrada en: " . $imagePath);
            return response()->file($imagePath);
        } else {
            \Log::error("Imagen NO encontrada en: " . $imagePath);
            \Log::info("Buscando en: " . $alumno->fotografia);
        }
        
        return $this->getNoPhotoImage();
    }
    
    private function getNoPhotoImage()
    {
        // Intentar con nophoto.jpg primero
        $noPhotoImage = public_path('assets/img/nophoto.jpg');
        if(file_exists($noPhotoImage)) {
            return response()->file($noPhotoImage);
        }
        
        // Intentar con noimage.png
        $defaultImage = public_path('assets/img/noimage.png');
        if(file_exists($defaultImage)) {
            return response()->file($defaultImage);
        }
        
        // Intentar con noalumno.png
        $defaultImage2 = public_path('assets/img/noalumno.png');
        if(file_exists($defaultImage2)) {
            return response()->file($defaultImage2);
        }
        
        // Si no existe ninguna, devolver 404
        abort(404, 'Imagen no encontrada');
    }
}