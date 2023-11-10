<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClusterImage extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'cluster_id',
        'image_path',
    ];

    public function getImagePathAttribute($val){

        return ($val !==null)?asset('images/clusters/'.$val):"";
    }
}
