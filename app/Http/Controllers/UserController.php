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

    




}
