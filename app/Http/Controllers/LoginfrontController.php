<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginfrontController extends Controller
{
    public function index(){

        return view('login');
    }
}
