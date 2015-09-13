@foreach ($comments as $comment)
    @include('posts.partials._comment', ['comment' => $comment])

    <ul>
        @include('posts.partials._tree', ['comments' => $comment->children()])
    </ul>
@endforeach