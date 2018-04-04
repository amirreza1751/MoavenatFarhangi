<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class forum extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at','updated_at','created_at'];
    protected $fillable=['name','college_id', 'forum_history', 'forum_statute'];
    protected $table = 'forums';
    public function college()
    {
        return $this->belongsTo('App\college','college_id');
    }
    public function project()
    {
        return $this->hasMany('App\project');
    }
    public function executive_staff()
    {
        return $this->hasMany('App\executiveStaff');
    }
}
