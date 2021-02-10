<?php

namespace App\Http\Controllers;

/**
 * Description of ConversorMoedasController
 *
 * @author Marcelo Barboza
 */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConversorMoedasController extends Controller
{

    public function conversor(Request $request)
    {
//        echo '<h1>Sessões</h1>';
//        $request->session()->put('name', 'Marcelo Eduardo Barboza');
//        $data = $request->session()->all();
//        echo '<pre>';
//        var_dump($data);
//        echo '</pre>';
        $data = [
            'target'=> url()->current()
        ];
        return view('conversor-moedas', $data);
    }

}
