<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name','slug','description', 'status'
    ];

    protected $attributes = [
        'status' => 1, //Default active selected value
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getStatusAttribute($attribute) {
        return $this->statusOption()[$attribute];
    }

    public function scopePublished($query) {
        return $query->where('status', 1);
    }

    public function scopeVisibility($query) {
        return $query->where('visibility', 1);
    }

    public function statusOption() {
        return [
            '0' => 'Unpublished',
            '1' => 'Publish',
        ];
    }
}
