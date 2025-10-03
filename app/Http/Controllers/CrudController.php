<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function showAll()
    {
        
        return view('crud-app.index');
    }

    public function createUser()
    {
        return view('crud-app.create');
    }

    public function saveUser(Request $request)
    {
        return "guardar usuario";
    }

    public function editUser(Request $request, $id)
    {
        return "editar usuario";
    }

    public function updateUser(Request $request, $id)
    {
        return "actualizar usuario";
    }

    public function deleteUser(Request $request, $id)
    {
        return "eliminar usuario";
    }
}
