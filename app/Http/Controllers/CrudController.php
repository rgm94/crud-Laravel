<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;

class CrudController extends Controller
{
    public function showAll()
    {
        $users = User::all();
        return view('crud-app.index',compact('users'));
    }

    public function createUser()
    {
        return view('crud-app.create');
    }

    public function saveUser(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|min:3',
                'email' => 'required|unique:users|string',
                'password' => 'required|min:8'
            ],

            [
                'name.required' => 'El nombre tiene que tener al menos 3 caracteres',
                'name.required' => 'El campo nombre debe estar relleno.',
                'email.required' => 'El campo email debe estar relleno.',
                'email.unique' => 'Este email ya está registrado.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            ]
        );
        
        $user = new User();
        $user->name = Str::headline($request->name);
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        
        if(!$user)
        {
            return Redirect::route('create')->withErrors(['error' => 'Error, usuario no registrado.']);
        }
        return Redirect::route('create')->with(['success' => 'Usuario registrado con éxito']);
    }

    public function editUser($id)
    {   
        $user = User::findOrFail(decrypt($id));
        return view('crud-app.editar',compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|min:3',
                'email' => 'required|unique:users|string',
                'password' => 'required|min:8'
            ],

            [
                'name.required' => 'El nombre tiene que tener al menos 3 caracteres',
                'name.required' => 'El campo nombre debe estar relleno.',
                'email.required' => 'El campo email debe estar relleno.',
                'email.unique' => 'Este email ya está registrado.',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            ]
        );
    
        $user = User::findOrFail($id);
        $user->name = Str::headline($request->name);
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return Redirect::route('edit',encrypt($id))->with(['success' => 'Usuario actualizado!!']);
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::findOrFail(decrypt($id));
        $user->delete();

        return Redirect::route('index')->with(['success' => 'Usuario Eliminado']);
    }
}
