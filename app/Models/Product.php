<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['slug', 'is_available'];
    protected $appends = ['image_url'];

    protected function getImageUrlAttribute()
    {
        return $this->image ? asset("storage/$this->image") : "https://placeholder.com/assets/images/150x150-2-500x500.png";
    }
    
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }
}
