<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AlumnoController extends Controller {
    public function index(): View {
        $alumnos = Alumno::all();
        return view('alumno.index', ['alumnos' => $alumnos]);
    }

    public function create(): View {
        return view('alumno.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'nombre' => 'required|min:2|max:50|string',
            'apellidos' => 'required|min:2|max:100|string',
            'telefono' => 'required|min:9|max:15',
            'correo' => 'required|email|max:100|unique:alumnos',
            'fecha_nacimiento' => 'required|date',
            'nota_media' => 'required|numeric|min:0|max:10',
            'experiencia' => 'nullable|min:10|max:1000',
            'formacion' => 'nullable|min:10|max:1000',
            'habilidades' => 'nullable|min:5|max:500',
            'fotografia' => 'nullable|image|max:1024',
        ]);
        
        $result = false;
        $alumno = new Alumno($request->all());
        try {
            $result = $alumno->save();
            $path = $this->upload($request, $alumno->id);
            if ($path != null) {
                $alumno->fotografia = $path;
                $result = $alumno->save();
            }
            $message = 'El alumno ha sido creado exitosamente.';
        } catch(UniqueConstraintViolationException $e) {
            $message = 'Error: Ya existe un alumno con el mismo correo electrónico.';
        } catch(QueryException $e) {
            $message = 'Error: Alguno de los campos requeridos está vacío.';
        } catch(\Exception $e) {
            $message = 'Se ha producido un error, en caso de que persista, consulte al administrador.';
        }
        
        if($result) {
            return redirect()->route('main.index')->with('general', $message);
        } else {
            return back()->withInput()->withErrors(['general' => $message]);
        }
    }

    private function upload(Request $request, $id) {
        $path = null;
        if($request->hasFile('fotografia') && $request->file('fotografia')->isValid()) {
            $image = $request->file('fotografia');
            $fileName = $id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $fileName, 'public');
        }
        return $path;
    }

    public function show(Alumno $alumno): View {
        $year = Carbon::now()->year;
        return view('alumno.show', ['alumno' => $alumno, 'year' => $year]);
    }

    public function edit(Alumno $alumno) {
        return view('alumno.edit', ['alumno' => $alumno]);
    }

    public function update(Request $request, Alumno $alumno) {
        $request->validate([
            'nombre' => 'required|min:2|max:50|string',
            'apellidos' => 'required|min:2|max:100|string',
            'telefono' => 'required|min:9|max:15',
            'correo' => 'required|email|max:100|unique:alumnos,correo,' . $alumno->id,
            'fecha_nacimiento' => 'required|date',
            'nota_media' => 'required|numeric|min:0|max:10',
            'experiencia' => 'nullable|min:10|max:1000',
            'formacion' => 'nullable|min:10|max:1000',
            'habilidades' => 'nullable|min:5|max:500',
            'fotografia' => 'nullable|image|max:1024',
        ]);

        $result = false;
        if ($request->deleteimage == 'delete') {
            Storage::delete('public/' . $alumno->fotografia);
            $alumno->fotografia = null;
        }
        
        try {
            $path = $this->upload($request, $alumno->id);
            if ($path != null) {
                $alumno->fotografia = $path;
            }
            $result = $alumno->update($request->all());
            $message = 'El alumno ha sido actualizado exitosamente.';
        } catch(UniqueConstraintViolationException $e) {
            $message = 'Error: Ya existe un alumno con el mismo correo electrónico.';
        } catch(QueryException $e) {
            $message = 'Error: Alguno de los campos requeridos está vacío.';
        } catch(\Exception $e) {
            $message = 'Se ha producido un error, en caso de que persista, consulte al administrador.';
        }
        
        if($result) {
            return redirect()->route('alumno.edit', $alumno->id)->with('general', $message);
        } else {
            return back()->withInput()->withErrors(['general' => $message]);
        }
    }

    public function destroy(Alumno $alumno) {
        try {
            $result = $alumno->delete();
            $message = 'El alumno ha sido eliminado exitosamente.';
        } catch(\Exception $e) {
            $result = false;
            $message = 'El alumno no ha podido ser eliminado.';
        }
        
        if($result) {
            return redirect()->route('alumno.index')->with('general', $message);
        } else {
            return back()->withInput()->withErrors(['general' => $message]);
        }
    }
}
