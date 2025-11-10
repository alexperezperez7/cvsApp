<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller {
    public function copy(): View {
        $arrayConDatos = [
            [
                'url'  => url('https://google.es'),
                'name' => 'Google'
            ],
            [
                'url'  => url('https://linkedin.com'),
                'name' => 'LinkedIn'
            ],
            [
                'url'  => route('main.index'),
                'name' => 'Inicio'
            ]
        ];
        return view('main.copy', ['navItems' => $arrayConDatos]);
    }

    public function index(): View {
        $alumnos = Alumno::all();
        foreach ($alumnos as $alumno) {
            $url = url('assets/img/noalumno.png');
            if($alumno->fotografia != null) {
                $url = url('storage/' . $alumno->fotografia);
            }
            $alumno->newPath = $url;
        }
        return view('main.index', ['alumnos' => $alumnos]);
    }

    public function prueba(): View {
        return view('main.prueba');
    }

    public function postprueba(Request $request) {
        $data = $request->all();
        $request->validate([
            'fotografia' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('fotografia');
        $customFileName = 'alumno-image.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('images', $customFileName);
        dd([$path, storage_path('app') . '/' . $path]);
    }
}
