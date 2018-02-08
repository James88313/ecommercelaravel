<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customers()
	{
		return $this->hasMany('App\Customer');
	}
}
