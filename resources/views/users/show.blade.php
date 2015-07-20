@extends('layout')

@section('title', 'Profile')

@section('content')
    <div class="row">
        <h3 class="col-sm-12">{{ $user->name }}</h3>

        <h5>
            Member since {{ Carbon::createFromTimeStamp(strtotime($user->created_at))->diffForHumans() }}
        </h5>

        <h3>You have {{ $number_of_posts }}</h3>

        <hr>
    </div>

    @stop
