<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    protected $fillable = ['user_id', 'post_id', 'parent_id', 'content'];

    public function post()
    {
        $this->belongsTo('App\Post', 'post_id');
    }

    public function children()
    {
        return self::where('parent_id', $this->id)->get();
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
