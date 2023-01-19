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



        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password,'isActive'=>1])){
            $id = Auth::user()->id;
            $role= Auth::user()->role;
            session()->put('id',$id);
            session()->put('role',$role);

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

        $data = User::all();

        return view('AdminPortal.user.userManagement')->with('data',$data);
    }
    public function AddUser(Request $request){

        $this->validate($request,[
            'email'=>'unique:users'
        ]);


        $userId = Str::random(7);

        $user = new User;

        $user->userId = $userId;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->isActive =1;


        $user->save();
        return redirect()->back()->with('message', 'New User Added !');

    }

    public function ChangePasswordView($id){
        return view('AdminPortal.user.changePassword')->with('id',$id);
    }
    public function ChangePassword(Request $request){

        $id = $request->id;
        $cPwd = $request->cPwd;
        $newPwd = $request->newPwd;

        $data = User::find($id);

        $oldPwd = $data->password;


        if(Hash::check($cPwd,$oldPwd)){
            $user = User::find($id);
            $user->password = Hash::make($newPwd);
            $user->save();

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

        User::where(['userId'=>$userId])->update([
            'password'=>Hash::make($request->pwd)
        ]);
        return redirect()->back()->with('message', 'Password Reset Successfully');

    }
    public function DisableUser($userId){

        User::where(['userId'=>$userId])->update([
           'isActive'=>0
        ]);
        return redirect()->back()->with('message', 'User Disable Successfully');
    }






}
