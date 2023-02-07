<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\locator;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class locatorController extends Controller
{
    //


    public function LocatorManagementDisplay(){

        //$response = Http::get('http://127.0.0.1:8080/api/locatorManagement');
        $client = new Client();
        $response = $client->get(config('app.api_url') .'/api/locatorManagement'); 
        $data = $response->getBody()->getContents();
        $data = json_decode($data);

        return view('AdminPortal.Locator.locatorManagement')->with('data',$data);
    }

    public function EditLocator(Request $request){
        $locator = locator::find($request->EditlocatorId);

        $locator->locatorId = $request->input('EditlocatorId');
        $locator->description = $request->input('EditlocatorDescription');

        $locator->save();
        return redirect()->back()->with('message', 'Locator Updated !');



    }

    public function InsertLocator(Request $request){
        // $locator = new locator;

        // $locator->locatorId = $request->input('InlocatorId');
        // $locator->description = $request->input('InlocatorDescription');

        // $locator->save();
        // return redirect()->back()->with('message', 'New Locator Added !');

        $endpoint = config('app.api_url') . '/api/insertLocator';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'locatorId' => $request->InlocatorId,
                'description' => $request->InlocatorDescription
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','Locator added !');
        }else{
            return redirect()->back()->with('error','Failed to add locator');
        }
    }


    public function deleteLocator($locatorId){
        $endpoint = config('app.api_url') . '/api/deleteLocator';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'locatorId' => $locatorId
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','Locator deleted !');
        }else{
            return redirect()->back()->with('error','Failed to delete locator');
        }

    }

}
