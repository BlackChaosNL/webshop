<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "Product";
    // Fillable items
    protected $fillable = array('category', 'small_desc', 'large_desc', 'picture', 'price');

}
