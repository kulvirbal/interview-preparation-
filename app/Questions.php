<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    //for mass assignments
    protected $fillable = ["title", "body"];

    //relationship with user table
    public function users() {
        return $this->belongsTo(User::class);
    }

}
