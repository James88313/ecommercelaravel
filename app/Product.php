<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
	protected $fillable = [];

	public function images()
    {
    	return $this->belongsToMany('App\Image');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

   	public function brand()
   	{
   		return $this->belongsTo('App\Brand');
   	}

   	public function category()
   	{
   		return $this->belongsTo('App\Category');
   	}

    public function firstimage()
    {
      return $this->hasone('App\ProductImage', 'product_id', 'id');
    }

    public function allimage()
    {
      return $this->HasMany('App\ProductImage', 'product_id');
    }

}



// {
 //    use SoftDeletes;
	// public $table = 'cartoes';
 //    public $primaryKey = 'id';
 //    protected $fillable = ['users_id', 'cod_pedido', 'car_tipo', 'car_envio', 'car_retorno', 'car_status', 'AmountInCents', 'CreditCardBrand', 'CreditCardNumber', 'ExpMonth', 'ExpYear', 'SecurityCode', 'HolderName', 'InstallmentCount', 'OrderReference', 'ativo', 'created_at', 'updated_at', 'deleted_at'];

 //    public function users()
 //    {
 //        return $this->Hasone('App\Http\Models\Users', 'id', 'users_id');
 //    }

 //    public function usersdados()
 //    {
 //        return $this->belongsTo('App\Http\Models\UsersDados', 'users_id');
 //    }
// }