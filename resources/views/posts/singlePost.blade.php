@extends('layout')

@section('title','Create Post')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Post by {{ $post->user->name }}</div>
                        <div class="row">
                            <div class="col-md-2 panel-body">
                                @include('posts.partials.voteBlock')
                            </div>
                            <div class="col-md-10 panel-body">

                                <h2>{{ $post->title }}</h2>
                                <hr>
                                <article> {{ $post->content }}</article>

                            </div>
                        </div>
                    @if(Auth::user())
                        @include('posts.partials.form')
                    @endif




                    @if ($post->comments->count() > 0)
                        <div class="row">
                            <h5 class="title col-sm-12">Comments <small>({{ $post->comments->count() }})</small></h5>
                        </div>

                        @include('posts.partials.comments', ['post' => $post])
                    @else
                        <p>:'( no one has commented</p>
                    @endif



                </div>
            </div>
        </div>
    </div>

    @yield('foot')

    @stop

@stop
