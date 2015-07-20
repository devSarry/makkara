@extends('layout')

@section('title','Create Post')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Create a Post</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                {!! Form::open() !!}

                <!--Post title Field
                    Form::text('name : String', 'default : String', params : array) -->
                <div class="form-group">
                    {!! Form::label('Post title', 'Post title: ') !!}
                    {!! Form::textarea('title',null, ['class' => 'form-control', 'size' => '30x2']) !!}
                </div>

                <!--Post Field
                    Form::text('name : String', 'default : String', params : array) -->
                <div class="form-group">
                    {!! Form::label('post', 'Post: ') !!}
                    {!! Form::textarea('content',null, ['class' => 'form-control', 'size' => '30x5']) !!}
                </div>
                
                <!--- submit post button Field --->
                <div class="form-group">
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div>
    </div>
</div>
@stop
