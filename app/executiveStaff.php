<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class executiveStaff extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['fname', 'lname','forum_post','forum_id', 'student_id', 'phone_number', 'field', 'votes'];
    protected $table = 'executive_staffs';

    public function project()
    {
        return $this->belongsToMany('App\project', 'staff_project');
    }
    public function forum()
    {
        return $this->belongsTo('App\forum', 'forum_id');
    }
}
