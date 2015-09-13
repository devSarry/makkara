    <div class="panel-body">
        <div class="row">

            <ul class="comments row">

                @include('posts.partials._tree', ['comments' => $post->rootComments])
            </ul>

        </div>
    </div>
