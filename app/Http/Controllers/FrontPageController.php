<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontPageController extends Controller
{

    public function index()
    {
        if(Auth::check()){
            $user = Auth::user()->name;
        }else{
            $user = 'Please Login';
        }

        return View::make('pages.home')->with('user_name', $user);

        //return view('pages.home', with($user));
    }
}
