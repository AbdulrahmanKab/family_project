<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class person extends Model
{
    use SoftDeletes;
    protected $table= "person";

}
