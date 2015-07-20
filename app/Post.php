<?php

namespace App;



use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Post extends Model implements SluggableInterface
{
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
    protected $fillable = ['user_id',  'title',  'slug', 'content'];


    /*For use with slug generation*/

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     *
     * Return all posts sorted by date
     *
     * @return static
     */
    public function latest()
    {
        return $this->all()->sortByDesc('created_at')->paginate(2);
    }

    /**
     * @return mixed
     */
    public function getPaginate()
    {
        return DB::table('posts')->paginate(2);
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }



    public function rootComments()
    {

        return $this->hasMany('App\Comment')->wherePostId($this->id)->whereParentId(null);
    }

    public function votes()
    {
        return $this->hasMany('Redditto\PostVote')->wherePostId($this->id)->sum('value');
    }


}
