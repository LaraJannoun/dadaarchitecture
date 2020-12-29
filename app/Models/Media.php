<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
	public function Project()
    {
        return $this->belongsTo('App\Models\Project', 'project_id');
    }
}
