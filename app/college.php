<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class college extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $fillable = ['name'];
    protected $table = 'colleges';

    public function forum()
    {
        return $this->hasMany('App\forum');
    }
}
