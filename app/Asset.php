<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','desc','file','url'];
    protected $dates = ['deleted_at'];
}
