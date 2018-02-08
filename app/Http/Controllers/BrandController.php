<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Brand;
use Session;
use DB;
use File;
use Storage;

class BrandController extends Controller
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
        $brands = Brand::all();
        return view('admin/brands/view')->withBrands($brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brands/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $brand = new Brand();
        $brand->name = Input::get('name');
        $brand->image = Input::file('brand_image');
  
            
        if($brand->save()){
            $data = Input::except('_token');
            
            if(Input::hasFile('brand_image'))
            {
                $name = $brand->name.'-'.$brand->id;
                
                $name = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

                $newname = preg_replace('/[^A-Za-z0-9]/', "-", $name);
                
                $newname = strtolower($newname);
                // GET EXTENSION OF THE FILE
                $extension = $brand->image->extension();
                // CREATE FILE NAME
                $filename = $newname.'.'.$extension;
                // DO UPLOAD
                $upload = $brand->image->storeAs('brands', $filename);

                if(!$upload){
                    return redirect()
                            ->back()
                            ->with('Error', 'Upload Fail')
                            ->withInput();
                }
                $brand->image = $filename;
            }
        }

        $brand->save();
        
        \Session::flash('success', 'Brand successfully registered');
        return Redirect::to('admin/brands');
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
        $brand = Brand::findOrFail($id);
        return view('admin/brands/edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function update($id, Request $request)
    {
       $brand = Brand::findOrFail($id);
       
       $this->validate($request,[
        'name' => 'required|min:6',
        'brand_image' => 'mimes:jpeg,png,gif|max:4883',
       ]);

       $brand->name = $request->input('name');

       if(Input::hasFile('brand_image'))
       {
                // DELETE EXISTING FILE
                $oldfile = 'public/images/brands/'.$brand->image;
                File::delete($oldfile);

                $brand->image = Input::file('brand_image');

                $name = $brand->name.'-'.$brand->id;
                
                $name = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

                $newname = preg_replace('/[^A-Za-z0-9]/', "-", $name);
                
                $newname = strtolower($newname);
                // GET EXTENSION OF THE FILE
                $extension = $brand->image->extension();
                // CREATE FILE NAME
                $filename = $newname.'.'.$extension;
                // DO UPLOAD
                $upload = $brand->image->storeAs('brands', $filename);
                $brand->image = $filename;

                if(!$upload){
                    return redirect()
                            ->back()
                            ->with('Error', 'Upload Fail')
                            ->withInput();
                }
       }
       
       $brand->update($request->all());
       
       \Session::flash('success', 'Brand successfully updated');
       
       return Redirect::to('admin/brands/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        // DELETE EXISTING FILE
        $oldfile = 'public/images/brands/'.$brand->image;
        File::delete($oldfile);
        $brand->delete();
        
        \Session::flash('success', 'Brand successfully deleted');
        
        return Redirect::to('admin/brands');
    }
}
