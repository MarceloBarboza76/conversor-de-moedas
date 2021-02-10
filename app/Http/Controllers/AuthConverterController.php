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
        $data = $request->session()->all();
    }
}
