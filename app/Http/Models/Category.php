<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'categories';

	public function products()
	{
		return $this->hasMany('App\Product');
	}
}
