<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class roomController extends Controller
{
    //
    public function roomManagement(){
        //room details
        $client = new Client();
        $response = $client->get(config('app.api_url') .'/api/getAllRooms'); 
        $data = $response->getBody()->getContents();
        $data = json_decode($data);


        return view('AdminPortal.Room.roomManagement')->with('data',$data)->with('roomTypes', $this->getRoomTypes());;
    }

    public function getRoomTypes(){
        $client = new Client();
        $response = $client->get(config('app.api_url') .'/api/getRoomTypes'); 
        $data = $response->getBody()->getContents();
        $data = json_decode($data);

        return $data;
    }
}
