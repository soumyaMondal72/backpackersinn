<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    public $timestamps = false;
    protected $guarded = [];
    protected $table = 'categories';

    // relationship for fetch 
    public function posts()
    {
        return $this->hasMany('App\Post','category_id');
    }

}
