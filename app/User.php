<?php

namespace App;

use App\Post;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    /**
     * A user has many votes. If you want to see all the votes a user has made
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function votes()
    {
        return $this->hasMany('App\PostVote');
    }

    /**
     * A user can vote on a post.
     *
     * @param string $value
     * @param \App\Post $post
     * @return bool
     */
    public function vote($value, Post $post)
    {
        switch ($value)
        {
            case "Vote up";
                return $this->voteUp($post);
            case "Vote down";
                return $this->voteDown($post);
        }

        return false;

    }

    /**
     * A user can give a post an upvote
     *
     * @param \App\Post $post
     * @return bool
     */
    public function voteUp(Post $post)
    {
        if ( ! $this->hasVotedOnPost($post))
        {
            $this->votes()->create(['post_id' => $post->id, 'value' => 1]);

            return TRUE;
        }

        if ($this->hasVotedOnPost($post) && $this->postVote($post) == - 1)
        {
            $this->votes()->update(['post_id' => $post->id, 'value' => 1]);

            return TRUE;
        }

        return FALSE;
    }

    /**
     * A user can give a post a down vote.
     *
     * @param \App\Post $post
     * @return bool
     */
    public function voteDown(Post $post)
    {
        if ( ! $this->hasVotedOnPost($post))
        {
            $this->votes()->create(['post_id' => $post->id, 'value' => - 1]);

            return TRUE;
        } elseif ($this->hasVotedOnPost($post) && $this->postVote($post) == 1)
        {

            $this->votes()->update(['post_id' => $post->id, 'value' => - 1]);

            return TRUE;
        }

        return FALSE;
    }


    /**
     * Check to see if a user has voted on a post already
     *
     * @param \App\Post $post
     * @return bool
     */
    public function hasVotedOnPost(Post $post)
    {
        return (bool)$post->votes()->
        where('user_id', '=', $this->id)->count();
    }

    /**
     * Return the value of a users vote on a post.
     *
     * @param \App\Post $post
     * @return mixed
     */
    public function postVote(Post $post)
    {
        return $post->votes()->
        where('user_id', '=', $this->id)->first()->value;
    }
}
