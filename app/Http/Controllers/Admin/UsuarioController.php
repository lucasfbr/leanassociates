<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.usuarios.index', compact('users'));
    }
}
