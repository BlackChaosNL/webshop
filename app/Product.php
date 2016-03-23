<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Fillable items
    protected $fillable = array('cat_name', 'small_desc', 'large_desc', 'small_pic', 'large_pic', 'price');
}
