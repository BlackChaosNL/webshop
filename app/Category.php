<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = array('cat_name', 'cat_parent');
}
