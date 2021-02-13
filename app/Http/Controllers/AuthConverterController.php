<?php


namespace App\Http\Controllers;

/**
 * Description of AuthConverterController
 *
 * @author Marcelo Barboza
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AuthConverterController extends Controller
{
    public function cmAuth(Request $request)
    {
        $data = [
            'target'=> url()->current(),
            'titlePage'=> 'Login'
        ];
        
        return view('auth-converter', $data);
    }
    
    public function postProcess(Request $request)
    {
        $usuario = 'Admin';
        $hash = '$2y$10$UNw5f9QECzeXWNGJYx1dE.lwN7O2TObt53UBUzW9Q1tAbB2PsGWyW';
        
        if (!password_verify($request->post('password'), $hash) || $usuario !== $request->post('usuario')) {
            return redirect('/entrar');
        }
        $hashCookie = sha1('Conversor de Moedas'.time());
        Cookie::queue('conversorMoeda', $hashCookie);
        $request->session()->put('usuario.logado', true);
        $request->session()->put('usuario.hashCookie', $hashCookie);
        return redirect('/');
    }
    
    public function sair(Request $request)
    {
        $request->session()->flush();
        return redirect('/entrar');
    }
}
