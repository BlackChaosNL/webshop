<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = array('cat_name', 'cat_parent');

    public function getName(){
        return $this->cat_name;
    }

    public function getId(){
        return $this->id;
    }

    public function hasNoParent(){
        return ($this->cat_parent == null) ? true : false;
    }

    public function isFirst(){
        return ($this->id == 1) ? true : false;
    }

    public function isSubOf($id){
        return ($this->cat_parent == $id) ? true : false;
    }
}
