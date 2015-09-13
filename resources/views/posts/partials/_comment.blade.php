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
</li>
