@extends('layout')

@section('title', 'Edit Profile')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User Profile
                </div>
                <div class="panel-body">

                    <h3 class="col-sm-12">{{ $user->name }}</h3>
                <br>
                    {!! Form::open() !!}

                    <!--Name Field
                        Form::text('name : String', 'default : String', params : array) -->
                    <div class="form-group">
                        {!! Form::label('name', 'Name: ') !!}
                        {!! Form::text('name',$user->name, ['class' => 'form-control']) !!}
                    </div>

                    <!--Email Field
                        Form::text('name : String', 'default : String', params : array) -->
                    <div class="form-group">
                        {!! Form::label('email', 'Email: ') !!}
                        {!! Form::text('email',  $user->email, ['class' => 'form-control']) !!}
                    </div>

                    <!--- Submit Edit Button Field --->
                    <div class="form-group">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>


    </div>
    <hr>
@stop