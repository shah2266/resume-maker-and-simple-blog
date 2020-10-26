<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
    ];

    protected $attributes = [
        'status' => '0' //Default active selected value
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }


    public function getStatusAttribute($attribute) {
        return $this->statusOption()[$attribute];
    }


    public function statusOption() {
        return [
            '0' => 'Unpublished',
            '1' => 'Publish',
        ];
    }
}
