<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = [];

    protected $attributes = [
        'status' => 1, //Default active value in select box
        'banner_type' => 1, //Default active value in select box
    ];

    public function getStatusAttribute($attribute) {
        return $this->statusOptions()[$attribute];
    }

    public function scopePublish($query) {
        return $query->where('status', 1);
    }

    public function scopeUnpublished($query)
    {
        return $query->where('status', 0);
    }

    public function statusOptions() {
        return [
            1 => "Publish",
            0 => "Unpublished",
        ];
    }

    public function getBannerTypeAttribute($attribute) {
        return $this->bannerTypeOptions()[$attribute];
    }

    //Get Slider
    public function scopeSlider($query) {
        return $query->where('banner_type', 1)->orderByDesc('id');
    }

    //Get Image
    public function scopeImage($query){
        return $query->where('banner_type', 0)->orderByDesc('id');
    }

    public function bannerTypeOptions(){
        return [
            1 => 'Slider',
            0 => 'Image',
        ];
    }
}
