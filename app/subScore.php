<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class subScore extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['subject', 'coefficient', 'sub_score', 'standard_id'];
    protected $table = 'sub_scores';

    public function standard()
    {
        return $this->belongsTo('App\standard', 'standard_id');
    }
    public function subScoreL2()
    {
        return $this->hasMany('App\subScoreL2');
    }
}
