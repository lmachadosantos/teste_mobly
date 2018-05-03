<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image', 'price'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function requests()
    {
        return $this->belongsToMany(RequestProduct::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class);
    }
}
