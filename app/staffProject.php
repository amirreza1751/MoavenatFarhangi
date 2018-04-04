<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class staffProject extends Pivot
{
    use SoftDeletes;
    protected $dates = ['deleted_at', 'updated_at', 'created_at'];
    protected $fillable = ['staff_id', 'project_id', 'post' ];
    protected $table = 'staff_projects';

    public function getCreatedAtColumn()

    {

        return 'created_at';

    }



    public function getUpdatedAtColumn()

    {

        return 'updated_at';

    }

}
