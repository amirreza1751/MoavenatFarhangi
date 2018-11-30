<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $fillable = ['name', 'active', 'project_type_id'];
    protected $table = 'forms';

    public function factors(){

        return $this->belongsToMany(
            'App\Factor',
            'form_factors',
            'form_id',
            'factor_id');
    }
}
