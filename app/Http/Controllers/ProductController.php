<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\ProductTag;
use App\Tag;
use App\Category;
use App\Brand;
use App\ProductImage;
use Session;
use File;
use DB, compact;
use App\Quotation;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin/products/view')->withProducts($products)->withBrands($brands)->withCategories($categories)->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin/products/create')->withBrands($brands)->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDATION
        $this->validate($request,[
        'title' => 'required|min:6',
        'description' => 'required',
        //'images' => 'mimes:jpeg,png,gif|max:4883',
        'price' => 'required',
        'quantity' => 'required',
        'category' => 'required',
        'brand' => 'required',
        ]);

        $product = new Product();
        $product->name = Input::get('title');
        $product->description = Input::get('description');
        $product->price = Input::get('price');
        $product->quantity = Input::get('quantity');
        $product->category_id = Input::get('category');
        $product->brand_id = Input::get('brand');

        

        // FORMAT IMAGE FILENAME
        $name = $product->name;
        $name = strtolower(preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
        $name = preg_replace('/[ -]+/' , '-' , $name);
        $product->slug = $name;

        $product->save();
        // CREATE PRODUCT IMAGES
        $count = 1;
        foreach ($request->images as $image) {
            
            $extension = $image->extension();
            $newname = $name.'-'.$count.'.'.$extension;
            //$filename = $image->store('products/'.$product->id, $newname);
            $filename = $image->storeAs('products/'.$product->id, $newname);
            
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $newname
            ]);
            
            $count++;
        }
        
        // SYNC TAGS WITH PRODUCTS
        $product->tags()->sync($request->tags, false);

        Session::flash('success', 'Product successfully registered');
        return Redirect::to('admin/products/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $tags = Tag::all();
        $product = Product::with('tags')->findOrFail($id);

        // return view('admin/products/edit')->withProduct($product)->withBrands($brands)->withCategories($categories)->withTags($tags);
        return view('admin.products.edit', [
            'categories' => $categories,
            'brands' => $brands,
            'tags' => $tags,
            'product' => $product,
            'id' => $id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //VALIDATION
        $this->validate($request,[
        'title' => 'required|min:6',
        'description' => 'required',
        //'images' => 'mimes:jpeg,png,gif|max:4883',
        'price' => 'required',
        'quantity' => 'required',
        'category' => 'required',
        'brand' => 'required',
        ]);

        $product = new Product();
        $product->name = Input::get('title');
        $product->description = Input::get('description');
        $product->price = Input::get('price');
        $product->quantity = Input::get('quantity');
        $product->category_id = Input::get('category');
        $product->brand_id = Input::get('brand');

        

        // FORMAT IMAGE FILENAME
        $name = $product->name;
        $name = strtolower(preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
        $name = preg_replace('/[ -]+/' , '-' , $name);
        $product->slug = $name;


        $product->update($request->all());
        // CREATE PRODUCT IMAGES

        if( count($request->images) > 0 ){
        $count = 1;
        foreach ($request->images as $image) {
            
            $extension = $image->extension();
            $newname = $name.'-'.$count.'.'.$extension;
            //$filename = $image->store('products/'.$product->id, $newname);
            $filename = $image->storeAs('products/'.$product->id, $newname);
            
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $newname
            ]);
            
            $count++;
        }
        }
        
        // SYNC TAGS WITH PRODUCTS
        DB::table('product_tag')->where('product_id', '=', $id)->delete();
        
        $start = 0;
        while ( $start < count($request->tags) ){

            $producttag = new ProductTag();
            $producttag->product_id = $id;
            $producttag->tag_id = $request->tags[$start];
            $producttag->save();

        $start++;
        }

        Session::flash('success', 'Product successfully registered');
        return Redirect::to('admin/products/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // GET DIRECTORY NAME
        $folder = 'public/images/products/'.$product->id;

        // DELETE DIRECTORY
        File::deleteDirectory($folder);

        // DELETE PRODUCT IMAGE RELATIONS
        DB::table('product_image')->where('product_id', '=', $product->id)->delete();

        // REMOVE TAG RELATIONS
        $product->tags()->sync(array());
        
        // DELETE PRODUCT
        $product->delete();



        \Session::flash('success', 'Product successfully deleted');
        
        return Redirect::to('admin/products');
    }
}
