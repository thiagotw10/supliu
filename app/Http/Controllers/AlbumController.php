<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function album(){
        return view('dashboard.album.album');
    }

    public function albumForm(){
        return view('dashboard.album.album-form');
    }
}
