@foreach($post->comments as $comment)


    <div class="panel-body">
        <div class="row">
{{--            <p>{{ $comment->content }}</p>
            <p>authored by: {{ \App\User::query()->findOrFail($comment->user_id)->name }}</p>--}}

            <ul class="comments row">

                {{$comment->content}}

                @include('posts.partials._tree', ['comments' => $post->rootComments])
            </ul>

        </div>
    </div>
@endforeach