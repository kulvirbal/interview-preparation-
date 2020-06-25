<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Questions extends Model
{
    //for mass assignments
    protected $fillable = ["title", "body"];

    //relationship with user table
    public function users() {
        return $this->belongsTo(User::class);
    }

    /**
     * add slug 
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
}
