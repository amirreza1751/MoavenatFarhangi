<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['grade', 'is_final_judge','project_id','factor_id','user_id'];
    protected $table = 'results';
}
