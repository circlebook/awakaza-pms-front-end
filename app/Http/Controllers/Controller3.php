<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Controller3 extends Controller
{
    public function display(Request $request)
    {
    $response = Http::get('http://127.0.0.1:8080/api/view');
    $data = $response;
    $data = json_decode($data);
    return view(view: )
            
    return $data;
    }
}
