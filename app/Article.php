<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'cat_id',
        'title',
        'thumbnail_path',
        'description',
    ];

    public function getThumbnailPathAttribute($val){

        return ($val !==null)?asset('images/articles/'.$val):"";
    }
}
