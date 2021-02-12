<?php


namespace App\Http\Controllers;

/**
 * Description of AuthConverterController
 *
 * @author Marcelo Barboza
 */

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    
    public function seuNome(Request $request)
    {
        $usuario = 'Admin';
        $hash = '$2y$10$UNw5f9QECzeXWNGJYx1dE.lwN7O2TObt53UBUzW9Q1tAbB2PsGWyW';
        
        if (!password_verify($request->post('password'), $hash) || $usuario !== $request->post('usuario')) {
            return redirect('/entrar');
        }
        
        return redirect('/');
    }
}
