<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
	protected $fillable = ['users_id', 'cod_pedido', 'car_tipo', 'car_envio', 'car_retorno', 'car_status', 'AmountInCents', 'CreditCardBrand', 'CreditCardNumber', 'ExpMonth', 'ExpYear', 'SecurityCode', 'HolderName', 'InstallmentCount', 'OrderReference', 'ativo', 'created_at', 'updated_at', 'deleted_at'];

	public function images()
    {
    	return $this->belongsToMany('App\Image');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

   	public function brands()
   	{
   		return $this->Hasone('App\Brand');
   	}

   	public function categories()
   	{
   		return $this->Hasone('App\Category')
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