<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $fillable = ['name', 'coefficient', 'parent', 'level'];
    protected $table = 'factors';

    public function children()
    {
        return $this->hasMany('APP\Factor');
    }

    public function parent()
    {
        return $this->belongsTo('APP\Factor');
    }
}

