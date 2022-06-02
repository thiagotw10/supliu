<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \App\Models\Usuario as Usuario;

class LoginController extends Controller
{
    function login(Request $request){

        $request->validate([
            'email' => 'required',
            'senha' => 'required',
            ],[
               'email.required' => 'Preencha o email',
               'senha.required' => 'Preencha sua senha',
            ]);

            $usuario = Usuario::where('email', '=', $request->input('email'))->first();
            $senha = Usuario::where('senha', '=', md5($request->input('senha')))->first();


           if($usuario == null || $senha == null){
              return redirect()->back()->with('danger', 'Usuario ou senha incorreta');
           }


           $request->session()->put('token',md5(rand(777777777, 900000000000000)));

           $id = $usuario->id;
           $dados = Usuario::find($id);

           $dados->update([
              'token' => session()->get('token')
            ]);


           $request->session()->put('usuario', $usuario->nome);
           $request->session()->put('nivel', $usuario->nivel);
           $request->session()->put('email', $usuario->email);
           $request->session()->put('id', $usuario->id);
           $request->session()->flash('success', 'entrar');
           return redirect('/album');
      }


      function sair(Request $request){
        $request->session()->forget('token');
        $request->session()->flash('success', 'sair');
        return redirect('/login');
      }
}
