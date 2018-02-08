<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';   
    public function customers()
	{
		return $this->hasMany('App\Customer');
	}

    public function firstimage()
    {
      return $this->hasone('App\ProductImage', 'product_id', 'product_list');
    }

    public function product()
    {
      return $this->hasone('App\Product', 'id', 'product_list');
    }
}
