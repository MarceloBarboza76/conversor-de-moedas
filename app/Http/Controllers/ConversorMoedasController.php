<?php

namespace App\Http\Controllers;

/**
 * Description of ConversorMoedasController
 *
 * @author Marcelo Barboza
 */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Converted;

class ConversorMoedasController extends Controller
{

    public function conversor(Request $request)
    {
        $dbConverted = Converted::select('*')->orderByDesc('date_add')->paginate(5);
        
        $post_moeda = $request->session()->pull('post_moeda');
        
        $data = [
            'target'=> url()->current(),
            'base'=>$post_moeda['base'] ? $post_moeda['base'] : 'BRL',
            'result'=>$post_moeda['result'] ? $post_moeda['result'] : 'USD',
            'moeda_base'=>$post_moeda['moeda_base'] ? $post_moeda['moeda_base'] : 'Real Brasileiro',
            'moeda_result'=>$post_moeda['moeda_result'] ? $post_moeda['moeda_result'] : 'Dólar Americano',
            'price'=>$post_moeda['price'] ? number_format($post_moeda['price'], 2, ',', ' ') : '0,00',
            'converted'=> $post_moeda['converted'] ? number_format($post_moeda['converted'], 2, ',', ' ') : '0,00',
            'dateNow'=> date('d-m-Y'),
            'convertedTable'=>$dbConverted
        ];
        
        
        
        return view('conversor-moedas', $data);
    }
    
    public function postProcess(Request $request)
    {
        $vality = $request->validate([
            'base'=>['required', 'string'],
            'result'=>['required', 'string'],
            'moeda_base'=>['required','string'],
            'moeda_result'=>['required', 'string'],
        ]);
        
        $post_moeda = $request->post();
        unset($post_moeda['_token']);
        $priceBase = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        
        if (!$priceBase) {
            $priceBase = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT, ['options' => ['decimal'=>',']]);
            if ($priceBase) {
                $post_moeda['price'] = str_replace(',', '.', $priceBase);
            }else{
                return redirect('/');
            }
        }else{
            $post_moeda['price'] = $priceBase;
        }
        
        $requestAPI = $this->convReqApi($post_moeda['base']);
        $objectAPI = json_decode($requestAPI);
        $converted = $objectAPI->rates->{$post_moeda['result']} * $post_moeda['price'];
        $post_moeda['converted'] = number_format($converted, 2, '.', '');
        $request->session()->put('post_moeda', $post_moeda);
        
        $dbConverted = new Converted();
        $dbConverted->moeda_base = $post_moeda['base'].' - '.$post_moeda['moeda_base'];
        $dbConverted->moeda_converted = $post_moeda['result'].' - '.$post_moeda['moeda_result'];
        $dbConverted->value_base = number_format($post_moeda['price'], 2, '.', '');
        $dbConverted->value_converted = number_format($converted, 2, '.', '');
        $dbConverted->save();
        
        return redirect('/');
    }
    
    private function convReqApi($base = '')
    {
        
        $api = 'https://api.exchangeratesapi.io/latest';
        $curl = curl_init($api . '?base='.$base);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $file = curl_exec($curl);
        return $file;
    }

}
