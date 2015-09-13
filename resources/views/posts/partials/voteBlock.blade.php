{!! Form::open(array('method' => 'post',
                    'action' => array('PostController@vote', $post->slug))) !!}
        <!--- vote up Field --->
<div class="form-group">
    {!! Form::submit('Vote up', ['class' => 'btn btn-primary', 'name' => 'value']) !!}
</div>
{!! Form::close() !!}


        <div class="score">
            <h3> {{ $post->score() }}</h3>
        </div>

{!! Form::open(array('method' => 'post',
                    'action' => array('PostController@vote', $post->slug))) !!}
        <!--- vote up Field --->
<div class="form-group">
    {!! Form::submit('Vote down', ['class' => 'btn btn-primary', 'name' => 'value']) !!}
</div>
{!! Form::close() !!}