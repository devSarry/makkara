<?php

namespace App\Providers;

use App\Comment;
use App\Post;
use Illuminate\Routing\Router;
use Illuminate\Http\Request;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //

        parent::boot($router);

/*        $router->bind('user', function($user)
        {
            return User::query()->where('name', '=', $user)->firstOrFail();
        });*/

        $router->bind('post', function($post)
        {
            return Post::query()->where('slug', '=', $post)->first();

            //dd(Post::with('comments')->where('slug', '=', $post)->get());

            return Post::with('comments.author')->get();
        });


    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
