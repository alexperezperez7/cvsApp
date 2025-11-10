<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function view($id)
    {
        $alumno = Alumno::find($id);
        
        // Si no existe el alumno, mostrar imagen "no photo"
        if($alumno == null) {
            return $this->getNoPhotoImage();
        }
        
        // Si el alumno no tiene foto, mostrar imagen "no photo"
        if($alumno->fotografia == null) {
            return $this->getNoPhotoImage();
        }
        
        // Construir ruta completa de la imagen
        $imagePath = storage_path('app/public/' . $alumno->fotografia);
        
        // Verificar si el archivo existe
        if(!file_exists($imagePath)) {
            return $this->getNoPhotoImage();
        }
        
        // Devolver la imagen
        return response()->file($imagePath);
    }
    
    private function getNoPhotoImage()
    {
        $noPhotoImage = public_path('assets/img/nophoto.jpg');
        if(file_exists($noPhotoImage)) {
            return response()->file($noPhotoImage);
        }
        
        // Si no existe nophoto.jpg, intentar con noimage.png
        $defaultImage = public_path('assets/img/noimage.png');
        if(file_exists($defaultImage)) {
            return response()->file($defaultImage);
        }
        
        // Si no existe ninguna, devolver 404
        abort(404);
    }
}