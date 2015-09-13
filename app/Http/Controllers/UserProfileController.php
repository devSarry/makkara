<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\User;

use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{

    public function index(User $user)
    {

        $number_of_posts =  $user->posts()->count();

        return view('users.profile', ['number_of_posts' => $number_of_posts, 'user' => Auth::user()]);
    }
}
