<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use  \App\Models\Usuario as Usuario;

class Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $usuarios = Usuario::find($request->session()->get('id'));
        $token = $request->session()->get('token');
        if(($token != isset($usuarios->token)) || ($usuarios == null || $token == null)){

            $request->session()->flash('success', 'sairExpirou');
            return redirect('/login');
        }
        return $next($request);
    }
}
