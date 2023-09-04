<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante_curso;
use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Support\Facades\DB;


class EstudianteController extends Controller
{
    public function estudiantes5to(){
        $Estudiante5 = DB::table('estudiantes')
        ->join('_estudiantes__cursos', 'estudiantes.id', '=', '_estudiantes__cursos.estudiante_id')
        ->join('cursos', '_estudiantes__cursos.curso_id', '=', 'cursos.id')
        ->select('estudiantes.*', 'cursos.*')->where('cursos.grado',5)
        ->get();
        return response()->json($Estudiante5);
    }
    public function cursos_estudiantes(){
        $datosRelacionados = DB::table('estudiantes')
        ->join('_estudiantes__cursos', 'estudiantes.id', '=', '_estudiantes__cursos.estudiante_id')
        ->join('cursos', '_estudiantes__cursos.curso_id', '=', 'cursos.id')
        ->select('estudiantes.*', 'cursos.*')
        ->get();
        return response()->json($datosRelacionados);
    }
    public function ejercicioTop5(){
        $top5 = DB::table('estudiantes')
        ->join('_estudiantes__cursos', 'estudiantes.id', '=', '_estudiantes__cursos.estudiante_id')
        ->join('cursos', '_estudiantes__cursos.curso_id', '=', 'cursos.id')
        ->select('estudiantes.*', 'cursos.*')->where('cursos.grado',6)->take(5)
        ->get();

        return response()->json($top5);
    }
    public function ordenarCi(){
        $ordenar = Estudiante::orderBy('ci','desc')->get();
        return response()->json($ordenar);
    }
    public function registrar($nombre,$grado){
        $estudiante = new Estudiante;
        $estudiante->nombre=$nombre;
        //$estudiante->save();

        $estudianteNuevo = Estudiante::where('nombre','=',$nombre)->first();

        $curso = Curso::where('grado','=' ,$grado)->first();

        $relacion= new Estudiante_curso;
        $relacion-> estudiante_id =$estudianteNuevo->id;
        $relacion -> curso_id = $curso->id;
        return response()->json($curso);
    }
    public function sumaPrueba(){
        $resultado = DB::table('cursos')
        ->selectRaw('SUM(grado) as Suma')
        ->first();
        return response()->json($resultado);
    }
    public function promedioPrueba(){
        $resultado = DB::table('cursos')
        ->selectRaw('AVG(grado) as Suma')
        ->first();
        return response()->json($resultado);
    }
}
