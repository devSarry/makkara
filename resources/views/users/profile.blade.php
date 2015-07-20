@extends('layout')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                User Profile
            </div>
            <div class="panel-body">

                <h3 class="col-sm-12">{{ $user->name }}</h3>

                <h5>
                    Member since {{ Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() }}
                </h5>

                <h3>
                    You have {{ $user->posts()->count() }}
                    <a href="{{ url('user/' . $user->name . '/posts') }}"> posts</a>
                </h3>
                @if(Auth::user())

                <a href="{{ url('user/' . $user->name . '/edit') }}" class="btn btn-primary">Edit Profile</a>

                @endif

            </div>
        </div>
        </div>


    </div>
    <hr>
@stop