<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payerinfo;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class payerinfoController extends Controller
{
    public function Insertpayerinfo(Request $request){


        $endpoint = config('app.api_url') . '/api/addPayerInfo';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'Address' => $request->Address         
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','info added !');
        }else{
            return redirect()->back()->with('error','Failed to add');
        }
    }

}
