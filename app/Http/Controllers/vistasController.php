<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vistasController extends Controller{

    public function home(){
        return view('home');
    }
}
