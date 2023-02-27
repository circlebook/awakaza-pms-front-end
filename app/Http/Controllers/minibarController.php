<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class minibarController extends Controller
{
     public function miniBarItemGetAll(){



        $client = new Client();
        $response = $client->get(config('app.api_url') .'/api/getMiniBarItems'); 
        $data = $response->getBody()->getContents();
        $data = json_decode($data);

        return view('HouseKeeping.Mini_bar')->with('data',$data);
    }
    public function insertMinibarItem(Request $request){
       
        $endpoint = config('app.api_url') . '/api/insertMiniBarItems';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'name' => $request->minBaritemName,
                'price' => $request->minibarPrice
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','Item added !');
        }else{
            return redirect()->back()->with('error','Failed to add item');
        }
    }
     public function editMinibarItem(Request $request){
       
        $endpoint = config('app.api_url') . '/api/editMiniBarItems';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                 'id' => $request->itemId,
                'name' => $request->minBaritemName,
                'price' => $request->minibarPrice
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','Item Modified !');
        }else{
            return redirect()->back()->with('error','Failed to edit item');
        }
    }
  
}