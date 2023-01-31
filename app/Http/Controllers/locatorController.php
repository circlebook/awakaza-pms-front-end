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

        $response = Http::post('http://127.0.0.1:8080/api/addSupplier', [
            'sName' =>  $request->sName,
            'phone' =>  $request->phone,
            'line1' =>  $request->line1,
            'line2' =>  $request->line2,
            'street' =>  $request->street,
            'city' =>  $request->city

        ]);
        $data = $response->getBody()->getContents();
        $data = json_decode($data);
    }

}
