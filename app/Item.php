<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'category_id',
        'title',
        'thumbnail_path',
    ];

    public function categories(){
        return $this->belongsTo(Category::class);
    }

    public function getThumbnailPathAttribute($val){

        return ($val !==null)?asset('images/items/'.$val):"";
    }

}
