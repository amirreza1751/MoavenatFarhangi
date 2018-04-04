<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class subScoreL2 extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['subject_l2', 'coefficient_l2', 'sub_score_l2', 'sub_score_id'];
    protected $table = 'sub_score_l2s';

    public function subScore()
    {
        return $this->belongsTo('App\subScore', 'sub_score_id');
    }
}
