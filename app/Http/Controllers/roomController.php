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

    public function addRoom(Request $request){

        $endpoint = config('app.api_url') . '/api/addRoom';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'roomTypeId' => $request->InRoomType,
                'bedType' => $request->bedType,
                'airConditioning' => $request->InAir,
                'miniBar' => $request->miniBar,
                'cleanState' => $request->cleanState
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','Room added !');
        }else{
            return redirect()->back()->with('error','Failed to add Room');
        }
    }

    public function editRoom(Request $request){
        $endpoint = config('app.api_url') . '/api/editRoom';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'roomNo' => $request->roomNo,
                'roomTypeId' => $request->InRoomType,
                'bedType' => $request->bedType,
                'airConditioning' => $request->InAir,
                'miniBar' => $request->miniBar,
                'cleanState' => $request->cleanState
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','Room Details Updated !');
        }else{
            return redirect()->back()->with('error','Failed to update Room Details');
        }



    }
}
