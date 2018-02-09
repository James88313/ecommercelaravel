<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Category;
use App\Brand;
use App\Order;
use App\User;
use App\Tag;
use Session;
use DB;
use File;
use Storage;
use Rand;
use Auth;


class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function about()
    {
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();

        $brands = Brand::all();
        $categories = Category::all();
        return view('about', [
            'brands' => $brands,
            'categories' => $categories,
            'shopcart_sum' => $shopcart_sum,
            'shopcart_list' => $shopcart_list,
        ]);
    }

    public function index()
    {


//  atualiza a sessão do usuário atual para manter o carrinho funcionando
if( isset(Auth::user()->email) ){
if( strlen(Auth::user()->email) >= 0 ){
    DB::table('orders')
        ->where('user_id', session()->get('user_id'))
        ->update([
            'user_id' => Auth::user()->email,
        ]
    );

    session()->put('user_id', Auth::user()->email);
}
}


//  verifica se existe uma session ativa para efetuar compras, se não existir, cria uma
if( strlen(session()->get('user_id')) <= 0 ){
    session()->put('user_id', date('Ymd_hms_ms') . rand());
}
        
        //  soma o valor do total do carrinho da sessão atual
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();

        // return $shopcart_list;

        $brands = Brand::all();
        $products = Product::with('firstimage')->get();
        $categories = Category::all();

        return view('home', [
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
            'shopcart_sum' => $shopcart_sum,
            'shopcart_list' => $shopcart_list,
        ]);
    }

    public function category($category)
    {
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();
        $brands = Brand::all();
        $categories = Category::all();

        $products = Product::where('category_id', $category)->get();

        return view('products', [
            'brands' => $brands,
            'categories' => $categories,
            'shopcart_sum' => $shopcart_sum,
            'shopcart_list' => $shopcart_list,
            'products' => $products,
            'category' => $category,
        ]);
    }

    public function account()
    {
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::get();

        return view('account', [
            'brands' => $brands,
            'categories' => $categories,
            'shopcart_sum' => $shopcart_sum,
            'shopcart_list' => $shopcart_list,
            'product' => $product,
        ]);
    }

    public function orders()
    {
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::get();

        return view('orders', [
            'brands' => $brands,
            'categories' => $categories,
            'shopcart_sum' => $shopcart_sum,
            'shopcart_list' => $shopcart_list,
            'product' => $product,
        ]);
    }

    public function cart()
    {
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();

        // return $shopcart_list;

        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::get();

        return view('cart', [
            'brands' => $brands,
            'categories' => $categories,
            'shopcart_sum' => $shopcart_sum,
            'product' => $product,
            'shopcart_list' => $shopcart_list,
        ]);
    }  

    public function checkout()
    {
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();
        $brands = Brand::all();
        $categories = Category::all();
        $product = Product::get();

        return view('checkout', [
            'brands' => $brands,
            'categories' => $categories,
            'shopcart_sum' => $shopcart_sum,
            'shopcart_list' => $shopcart_list,
            'product' => $product,
        ]);
    }

    public function details($id, $slug)
    {
        $shopcart_sum = Order::where('user_id', session()->get('user_id'))->sum('product_value');
        $shopcart_list = Order::where('user_id', session()->get('user_id'))->with('firstimage')->with('product')->get();
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::with('allimage')->find($id);

        return view('product_detail', [
            'brands' => $brands,
            'categories' => $categories,
            'shopcart_sum' => $shopcart_sum,
            'shopcart_list' => $shopcart_list,
            'products' => $products,
            'id' => $id,
            'slug' => $slug,
        ]);
    }



    public function shopcart_add($id, $slug, Request $request)
    {
// session()->put('user_id', date('Ymd_hms_ms') . rand());

if( strlen(session()->get('user_id')) <= 0 ){
    session()->put('user_id', date('Ymd_hms_ms') . rand());
}

$price = Product::find($id);

$order = new Order();
$order->status = 'pending';
$order->user_id = session()->get('user_id');
$order->quantity = Input::get('quantity');
$order->product_value = $order->quantity * $price->price;
$order->product_list = $id;
$order->product_value = $price->price * $order->quantity;
$order->payment_method_id = 0;
$order->amount_paid = 0;

        $check = Order::where('user_id', session()->get('user_id'))->where('product_list', $id)->get();

        if( count($check) == 0 ){
            $order->save();
            \Session::flash('success', 'Product add with success');
            return Redirect::to(url('details/'.$id.'/'.$slug.''));
        } else {

            DB::table('orders')
                    ->where('user_id', session()->get('user_id'))
                    ->where('product_list', $id)
                    ->update([
                        'quantity' => $order->quantity,
                        'product_value' => $order->product_value
                    ]);
            \Session::flash('success', 'Product add with success!');
            return Redirect::to(url('details/'.$id.'/'.$slug.''));
        }
        return $data;
    }


    public function cart_remove($id)
    {
        DB::table('orders')->where('id', '=', $id)->delete();

        \Session::flash('success', 'Product successfully deleted');
        return Redirect::to('/cart');
    }


    public function register_new(Request $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->where('cpf', $data['cpf'])->get();

        $data['password'] = bcrypt($data['password']);
        $data['confirm-password'] = bcrypt($data['confirm-password']);

        if( count($user) == 0 ){
            User::create($data);


            DB::table('orders')
                    ->where('user_id', session()->get('user_id'))
                    ->where('product_list', $id)
                    ->update([
                        'quantity' => $order->quantity,
                        'product_value' => $order->product_value
                    ]);

            \Session::flash('success', 'Register success. Please login to continue.');
            return Redirect::to(url('/login'));
        } else {
            \Session::flash('success', 'User already registered. Please login to continue.');
            return Redirect::to(url('/'));
        }
    }
}