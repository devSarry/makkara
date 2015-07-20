<div class="panel panel-body">
    <hr/>
    <h5>Write a new comment</h5>

    {!! Form::open(array('url' => '/posts/'. $post->slug . '/comments' )) !!}

    <!--Comment Field
        Form::text('name : String', 'default : String', params : array) -->
    <div class="form-group">
        {!! Form::label('comment', 'Comment: ') !!}
        {!! Form::textarea('comment',null, ['class' => 'form-control']) !!}
    </div>

    <!--- submit Comment Field --->
    <div class="form-group">
        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
</div>