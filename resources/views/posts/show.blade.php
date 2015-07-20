@extends('layout')

@section('title','Create Post')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">Create a Post</div>
                    <div class="panel-body">
                    <ul class="list-group">
                        @foreach($posts as $post)
                        <li class="list-group-item-text">
                            <a href="{{ url('posts/' . $post->slug) }}">
                            <h2>{{ $post->title }}</h2>
                            <hr>
                            <p>{{ $post->content }}</p>
                            </a>
                        </li>

                        @endforeach
                    </ul>
                    </div>
                    {!! $posts->render() !!}
                </div>
            </div>
        </div>
    </div>
@stop
