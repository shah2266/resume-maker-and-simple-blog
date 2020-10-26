<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'description',
        'image',
        'is_published'
    ];

    protected $attributes = [
        'is_published' => 0,
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getStatusAttribute($attribute) {
        return $this->publishOptions()[$attribute];
    }

    public function publishOptions() {
        return [
            '1' => 'Publish',
            '0' => 'Unpublished',
        ];
    }

}
