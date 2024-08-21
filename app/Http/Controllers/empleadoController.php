<?php

namespace App\Http\Controllers;

use App\Models\empleadosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class empleadoController extends Controller
{
    public function saveImage(Request $request)
    {
        $empleado = new empleadosModel();

        $image = $request->file('imagen');
        $file = time() . $image->getClientOriginalName();
        Storage::disk('personas')->put($file, file_get_contents($image));

        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->cedula = $request->cedula;
        $empleado->puesto = $request->puesto;
        $empleado->latitud = $request->latitud;
        $empleado->longitud = $request->longitud;
        $empleado->foto = $file;
        $empleado->save();
        return response()->json(['message' => 'Datos guardados correctamente']);
    }

    public function buscarEmpleados(Request $request)
    {
        $query = empleadosModel::query();

        // Buscar por nombre
        if ($request->has('nombre') && $request->input('nombre') !== '') {
            $query->where('nombre', 'like', '%' . $request->input('nombre') . '%');
        }

        // Buscar por número de cédula
        if ($request->has('cedula') && $request->input('cedula') !== '') {
            $query->where('cedula', $request->input('cedula'));
        }

        $employees = $query->get();

        return response()->json($employees);
    }
}
