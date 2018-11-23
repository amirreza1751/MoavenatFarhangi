<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['name', 'type', 'start_date', 'start_time', 'end_date', 'place', 'level', 'capacity', 'cost',
        'final_cost', 'suggest_form', 'final_report', 'documentation', 'grade', 'total_hours',
        'forum_id','purpose','sideway_programs','detailed_programs','innovation','sponsors','description','master','letter_number','manager_sign','expert_sign'];
    protected $table = 'projects';


    public function forum()
    {
        return $this->belongsTo('App\forum', 'forum_id');
    }

    public function costs()
    {
        return $this->hasMany('App\cost');
    }


    public function executiveStaff()
    {
        return $this->belongsToMany('App\executiveStaff', 'staff_projects', 'project_id', 'staff_id');
    }

    public static function boot(){
        parent::boot();

        static::deleting(function ($project){
            $project->executiveStaff()->delete();
            $project->costs()->delete();
        });
    }
}
