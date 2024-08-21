<?php

namespace App\Http\Controllers;

use App\Models\usuariosModel;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function registrar(Request $request)
    {
        $user = new usuariosModel();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return back();
    }
}
