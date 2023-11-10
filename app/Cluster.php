<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cluster extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'service_id',
        'title',
        'subtitle',
        'description',
    ];


}
