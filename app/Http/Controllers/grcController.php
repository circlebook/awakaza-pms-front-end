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
                'roomNo' => 2,
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

    public function showGuest(){

        //$response = Http::get('http://127.0.0.1:8080/api/usermanagement');
        $client = new Client();
        $response = $client->get(config('app.api_url') .'/api/showguest'); 

        $data = $response->getBody()->getContents();
        $data = json_decode($data);

        return view('FrontOps.FrontOps_Grc')->with('data', $data);
        //return $data;
    }


    
    public function editGRC(Request $request){
        $endpoint = config('app.api_url') . '/api/editGRC';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'id' => $request->id,
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'passportNo' => $request->passportNo,
                'nicNo' => $request->nicNo,
                'birthDay' => $request->birthDay,
                'phoneNo' => $request->phoneNo,
                'email' => $request->email,
                // 'roomNo' => 2,
                // 'arrivalD' => $request->arrivalD,
                // 'departureD' => $request->departureD,
                
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','GRC Updated !');
        }else{
            return redirect()->back()->with('error','Failed to update GRC');
        }



    }
}
