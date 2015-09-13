<?php

namespace App;


use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model implements SluggableInterface {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'slug', 'content'];


    /*For use with slug generation*/

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];


    /**
     * Each post belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     *
     * Return all posts sorted by date
     *
     * @int $amount
     * @return static
     */
    public function latest($amount)
    {
        return $this->all()->sortByDesc('created_at')->paginate($amount);
    }


    /**
     * A post has many comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * The child comments of a parent post
     *
     * @return mixed
     */
    public function children()
    {
        return self::where('parent_id', $this->id)->get();
    }


    public function rootComments()
    {

        return $this->hasMany('App\Comment')->wherePostId($this->id)->whereParentId(NULL);
    }

    /**
     * A post has many votes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany('App\PostVote');
    }

    /**
     *Total number of votes a post has
     *
     * @return int
     */
    public function numberOfVotes()
    {
        return $this->votes()->count();
    }

    /**
     * Vote score of a post.
     *
     * @return int
     */
    public function score()
    {
        return $this->votes()->sum('value');
    }


    /**
     * Return the value of a users vote on a post.
     *
     *  1 -  up voted
     *  0 -  not voted
     * -1 - down voted
     *
     * @param $userId
     * @return int
     */
    public function hasVoted($userId)
    {
        if ( ! $userId )
        {
            return 0;
        } else
        {
            return $this->votes()->whereUserId(Auth::id())->first()->value;
        }

    }

    public function userVote(User $user)
    {
        $this->votes()->attach();
    }



    public function getValue($userId)
    {
        return ucfirst($userId);
    }

    public function setUp()
    {
        $this->attributes['value'] = 1;
    }


}
