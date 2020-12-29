<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
	use SoftDeletes;

	public function Category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
