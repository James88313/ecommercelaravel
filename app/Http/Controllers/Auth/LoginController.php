<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use App\Category;
use App\Order;
use App\Brand;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();

        $brands = Brand::all();
        $categories = Category::all();
        return view('auth.login', [
            'brands' => $brands,
            'categories' => $categories,
            'shopcart_sum' => $shopcart_sum,
            'shopcart_list' => $shopcart_list,
        ]);
    }
}
