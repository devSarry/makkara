<li class="comment row">
    <div class="profile col-sm-6">

        <a href="{{ url('user', $comment->author->name) }}">
            <div class="username">{{ $comment->author->name }}</div>
        </a>
    </div>

    <div class="time col-sm-6">
        {{ Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() }}
    </div>

    <p class="col-sm-12">{{ $comment->content }}</p>

    <ul class="actions list-inline col-sm-12">
        {{--<li><span class="vote-count">{{ $comment->votes() }}</span></li>--}}
        <li><a id="This will have to open a comment window that must pass the id of the comment">reply</a></li>
        <li><a>report</a></li>
        <li><a>permalink</a></li>
    </ul>

    <div class="comment-form">

        <div class="panel panel-body">
            <hr/>
            <h5>Write a new comment</h5>

            {!! Form::open(array('method' => 'post',
                                'action' => array('CommentController@storeChild', $post->slug, $comment))) !!}

                    <!--Comment Field
        Form::text('name : String', 'default : String', params : array) -->
            <div class="form-group">
                {!! Form::label('comment', 'Comment: ') !!}
                {!! Form::text('comment',null, ['class' => 'form-control']) !!}
            </div>

            <!--- submit Comment Field --->
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>
</li>
