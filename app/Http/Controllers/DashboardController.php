<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $userId=Auth::user()->id;
        $userType=Auth::user()->user_type;
        if($userType == '3')
        {
            return  redirect()->route('user_index');
        }
        $user=User::where('user_type','1')->count();
        $admin=User::where('user_type','2')->count();
        $company=User::where('user_type','3')->count();
        return view('dashboard', compact('user','admin','company'));
    }
    
}
