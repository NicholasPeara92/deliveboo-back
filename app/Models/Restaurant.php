<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = ['slug'];
    protected $appends = ['image_url'];

    protected function getImageUrlAttribute()
    {
        return $this->image ? asset("storage/$this->image") : "https://placeholder.com/assets/images/150x150-2-500x500.png";
    }
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
