<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cost extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['subject', 'cost','unit','requested_cost','approved_cost', 'project_id'];
    protected $table = 'costs';

    public function project()
    {
        return $this->belongsTo('App\project');
    }
}
