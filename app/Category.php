<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    //
   // use SoftDeletes;
    protected $fillable = [
        'category_type',
        'title',
        'thumbnail_path',
    ];

    public function getThumbnailPathAttribute($val){

        return ($val !==null)?asset('images/categories/'.$val):"";
    }

    public function item(){
        return $this->hasMany(Item::class);
    }


}
