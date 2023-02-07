<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class grcController extends Controller
{
    public function createGrc(Request $request){
       

        $endpoint = config('app.api_url') . '/api/createGrc';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'passportNo' => $request->passportNo,
                'nicNo' => $request->nicNo,
                'birthDay' => $request->birthDay,
                'phoneNo' => $request->phoneNo,
                'email' => $request->email,
                'arrivalD' => $request->arrivalD,
                'departureD' => $request->departureD,
            ],
            'verify' => false,
            'timeout' => 10,
            
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','GRC added !');
        }else{
            return redirect()->back()->with('error','Failed to add the GRC');
        }
    }
}
