<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormFactor extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['form_id', 'factor_id'];
    protected $table = 'form_factors';
}
