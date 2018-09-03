<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'posts';

    // relationship for fetch 
    // public function questions()
    // {
    //     return $this->hasMany('App\CategoryQuestions');
    // }

}
