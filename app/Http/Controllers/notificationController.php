<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class notificationController extends Controller
{
    public function getNotifications(Request $request){

        
        $endpoint = config('app.api_url') . '/api/getNotifications';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'userId' => 'Awakaza'
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        return Response::json($data);
    }
}
