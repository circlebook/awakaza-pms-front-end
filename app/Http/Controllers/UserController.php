<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ctr;
use App\Models\Supplier;
use App\Models\CtrTransfer;
use App\Models\Inr;
use App\Models\PrintedCheque;
use App\Models\Wnt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\View\View;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function Index(){
//        session()->forget('role');
//        session()->forget('id');
//        session()->flush();
//
//        return view('home.login');
    }
    public function Dashboard(){


        return view('dashboard');
    }


    public function Login(Request $request){

        // $response = Http::post('http://127.0.0.1:8080/api/login', [
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        $endpoint = config('app.api_url') . '/api/login';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if (!is_int($response)){          
            $id = $response->id;
            $role= $response->role;
            $name = $response->name;
            session()->put('id',$id);
            session()->put('role',$role);
            session()->put('name',$name);

                //return redirect('/dashboard');
                // Changed by: Geethaka
                return redirect('/mainDash');

        }else{
            return view('home.login')->withErrors(['Incorrect Login Details', 'The Message']);

        }

    }
    public function Logout(){

        session()->forget('role');
        session()->forget('id');
        session()->flush();

        return redirect('/');
    }


    public function UserManagement(){

        //$response = Http::get('http://127.0.0.1:8080/api/usermanagement');
        $client = new Client();
        $response = $client->get(config('app.api_url') .'/api/usermanagement'); 

        $data = $response->getBody()->getContents();
        $data = json_decode($data);

        return view('AdminPortal.user.userManagement')->with('data',$data);
    }
    public function AddUser(Request $request){

        $this->validate($request,[
            'email'=>'unique:users'
        ]);


        $userId = Str::random(7);

        $endpoint = config('app.api_url') . '/api/addUser';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'userId' => $userId,
                'name' => $request->name,
                'email' => $request->email,
                'contact' => $request->contact,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'isActive' => 1
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if ($response==1){ 
            return redirect()->back()->with('message', 'New User Added !');
        }
        else{
            return redirect()->back()->withErrors('message', 'User Addition Failed !');
        }
    }

    public function ChangePasswordView($id){
        return view('AdminPortal.user.changePassword')->with('id',$id);
    }
    public function ChangePassword(Request $request){

        $endpoint = config('app.api_url') . '/api/changePassword';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'userId' => $request->id,
                'id' => $request->id,
                'cPwd' => $request->cPwd,
                'newPwd' => $request->newPwd
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','Password Changed Sucessfully !');
        }else{
            return redirect()->back()->with('error','Your Current password does not matches with the password you provided. Please try again.');
        }

    }


    public function EditProfileView($id){

        $data = User::find($id);

        return view('AdminPortal.user.editProfile')->with('data',$data);

    }
    public function EditProfile(Request $request){


        $id = $request->id;

        User::where(['id'=>$id])->update([
           'name'=>$request->name,
            'email'=>$request->email,

        ]);
        return redirect()->back()->with('message', 'User Details Edited');
    }
    public function ResetPassword(Request $request){

        $userId = $request->userId;
        $password = Hash::make($request->pwd);

        $endpoint = config('app.api_url') . '/api/resetPassword';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'userId' => $userId,
                'password' => $password,
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

        if($response==1){
            return redirect()->back()->with('message','Password Reset Successfull !');
        }else{
            return redirect()->back()->with('error','Password resest failed');
        }
        

    }
    public function DisableUser($userId){

        $endpoint = config('app.api_url') . '/api/disableUser';
        $client = new Client();
        $response = $client->post($endpoint, [
            'form_params' => [
                'userId' => $userId
            ],
            'verify' => false,
            'timeout' => 10,
        ]);
        $data = $response->getBody()->getContents();
        $response = json_decode($data);

       
        if($response==1){
            return redirect()->back()->with('message', 'User Disable Successfull');
        }else{
            return redirect()->back()->with('error','User Disable failed');
        }
    }






}
