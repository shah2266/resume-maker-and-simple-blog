<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //protected $fillable = ['image','company_name','address', 'email', 'phone', 'telephone', 'copy_right_text','social_link_icon_1'];
    protected $guarded = [];

    protected $attributes = [
        'status' => 0, //Default active selected value
    ];

    public function getStatusAttribute($attribute) {
        return $this->statusOptions()[$attribute];
    }

    public function statusOptions() {
        return [
            '0' => 'Unpublished',
            '1' => 'Publish',
        ];
    }
}
