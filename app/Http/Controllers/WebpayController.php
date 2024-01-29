<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class WebpayController extends Controller {
    
    const BASE_URL_INT = 'https://webpay3gint.transbank.cl';

    function transactions(Request $request)
    {

        $response = Http::withHeaders(['Tbk-Api-Key-Id' => '597055555532',
        'Tbk-Api-Key-Secret' => '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C',
        'Content-Type' => 'application/json'])-> post(WebpayController::BASE_URL_INT.'/rswebpaytransaction/api/webpay/v1.2/transactions', [
                'buy_order' => $request->buy_order,
                'session_id' => $request->session_id,
                'amount' => $request->amount,
                'return_url' => 'http://localhost/primer-trabajo-mp/resultado-operacion.html'
        ]);

        $data = $response->json();
        return response($data, 200);
    }

    function confirm_transaction(Request $request){
        $response = Http::withHeaders(['Tbk-Api-Key-Id' => '597055555532',
        'Tbk-Api-Key-Secret' => '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C',
        'Content-Type' => 'application/json'])-> put(WebpayController::BASE_URL_INT.'/rswebpaytransaction/api/webpay/v1.2/transactions/'.$request->token);  
        
        $data = $response->json();
        return response($data, 200);
    }

    function get_transaction(Request $request){
        $response = Http::withHeaders(['Tbk-Api-Key-Id' => '597055555532',
        'Tbk-Api-Key-Secret' => '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C',
        'Content-Type' => 'application/json'])-> get(WebpayController::BASE_URL_INT.'/rswebpaytransaction/api/webpay/v1.2/transactions/'.$request->token);  
        
        $data = $response->json();
        return response($data, 200);
    }

    function refund_transactions(Request $request){
        $response = Http::withHeaders(['Tbk-Api-Key-Id' => '597055555532',
        'Tbk-Api-Key-Secret' => '579B532A7440BB0C9079DED94D31EA1615BACEB56610332264630D42D0A36B1C',
        'Content-Type' => 'application/json'])-> post(WebpayController::BASE_URL_INT.'/rswebpaytransaction/api/webpay/v1.2/transactions/'.$request->token.'/refunds', [
            'amount' => $request->amount
    ]);  
        
        $data = $response->json();
        return response($data, 200);
    }
}