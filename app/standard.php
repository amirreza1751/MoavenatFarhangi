<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class standard extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['st_name', 'final_score', 'st_coefficient', 'is_final_judgment', 'project_id', 'user_id'];
    protected $table = 'standards';

    public function project()
    {
        return $this->belongsTo('App\project', 'project_id');
    }

    public function user()
    {
        return $this->belongsTo('App\user', 'user_id');
    }

    public function subScore()
    {
        return $this->hasMany('App\subScore');
    }
}
