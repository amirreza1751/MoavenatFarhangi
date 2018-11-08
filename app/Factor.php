<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $fillable = ['name', 'coefficient', 'parent', 'level'];
    protected $table = 'factors';
}
