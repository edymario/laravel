<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class BuscaController extends Controller
{

    public function buscaUser()
    {
        $user = new User();
        $artigos = $user->where('usuario','admin')->get();

        return count($artigos) == '0'? true:false ;
    }
}
