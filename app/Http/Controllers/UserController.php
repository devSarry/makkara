<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show($user)
    {
        $profile = User::query()->where('name', '=', $user)->firstOrFail();

        return view('users.profile', ['user' => $profile]);
    }

    /**
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $profile = Auth::user();

        return view('users.edit', ['user' => $profile]);
    }

    public function update(Request $request)
    {
        $profile = Auth::user();

        $profile->update(['name' => $request->name, 'email' => $request->email]);

        return redirect(edit);

    }

    public function showPosts($user)
    {
        $user_ = User::query()->where('name', '=', $user)->firstOrFail();

       return $user_->posts;

        //return view('users.profile', ['user' => $user->po]);
    }

    public function showComments()
    {

    }
}
