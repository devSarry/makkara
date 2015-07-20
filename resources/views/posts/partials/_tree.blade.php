@foreach ($comments as $comment)
    @include('comment.partials._comment', ['comment' => $comment])

    <ul>
        @include('posts.partials._tree', ['comments' => $comment->children()])
    </ul>
@endforeach