<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'description', 
        'price', 
        'series', 
        'sale_date', 
        'type'
    ];
}
