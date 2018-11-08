<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];

    protected $fillable = ['name', 'active', 'project_type_id'];
    protected $table = 'factors';
}
