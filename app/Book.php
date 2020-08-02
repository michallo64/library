<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{


    protected $attributes = [
        'is_borrowed' => false,
    ];
    protected $fillable = [
        'title'
    ];
    public function author(){
        return $this->belongsTo('App\Author');
    }
}
