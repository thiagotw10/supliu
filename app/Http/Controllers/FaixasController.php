<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaixasController extends Controller
{
    public function album(){
        
        return view('album-front.album');
    }
}
