@extends('layout')



@section('content')
    <div class="content-head" xmlns="http://www.w3.org/1999/html">
        <div class="container">
            <h1 class="content-head-heading">Posts</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12- col-md-8-">
                <div class="panel- panel-default-">

                    <div class="panel-body">

                        @foreach($posts as $post)
                            <div class="post">



                                <div class="post-body col-md-10">

                                    <div class="col-md-2 panel-body">
                                        @include('posts.partials.voteBlock')
                                    </div>

                                    <h2 class="post-title"><a href="{{ url('posts/' . $post->slug) }}">{{ $post->title }}</a></h2>
                                    <p class="post-content"><a href="{{ url('posts/' . $post->slug) }}">{{ $post->content }}</a></p>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    {!! $posts->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop
