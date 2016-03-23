<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = array('menu_item', 'menu_parent');
    // disable id
    protected $hidden = array('id');
}
