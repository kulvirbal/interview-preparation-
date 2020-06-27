<?php

namespace App;
use Parsedown;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    //for mass assignments
    protected $fillable = ["title", "body"];

    //relationship with user table
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * add slug 
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute() {
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute() {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute() {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id != null) {
                return "answered-accepted";
            }
            return "answered";
        } else {
            return "unanswered";
        }
    }
    
    public function getBodyHtmlAttribute() {
        return \Parsedown::instance()->text($this->body);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }
}
