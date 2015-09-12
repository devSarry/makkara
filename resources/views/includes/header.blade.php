<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ url('/') }}">Makarapeurna</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    @if(Auth::guest())
                        <li><a href="{{ url('auth/login') }}">login</a></li>
                        <li><a href="{{ url('auth/register') }}">register</a></li>
                    @else
                        <li><a href="{{ url('auth/logout') }}">logout</a></li>

                        <li><a href="{{ url('user/' . Auth::user()->name) }}">Profile</a></li>
                        <li><a href="{{ url('posts/create') }}">Create Post</a></li>
                    @endif
                        <li><a href="{{ url('posts') }}">Posts</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>


