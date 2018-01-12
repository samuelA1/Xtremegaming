<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

    protected $fillable = [
        'user_id', 'image', 'title', 'content'
    ];

    public function user () {
        return $this->belongsTo('App\User');
    }

    public function comment() {
        return $this->hasMany('App\Comment');
    }
}
