<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Category;
use Session;
use DB;
use File;
use Storage;


class CategoryController extends Controller
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
        $categories = Category::all();
        return view('admin/categories/view')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/categories/create');
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
        'name' => 'required|min:6',
        'description' => 'required',
        'category_image' => 'mimes:jpeg,png,gif|max:4883',
        ]);
        
        $category = new Category();
        $category->name = Input::get('name');
        $category->description = Input::get('description');
        $category->image = Input::file('category_image');
            
        if($category->save()){
            $data = Input::except('_token');
            
            if(Input::hasFile('category_image'))
            {
                $name = $category->name.'-'.$category->id;
                
                $name = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

                $newname = preg_replace('/[^A-Za-z0-9]/', "-", $name);
                
                $newname = strtolower($newname);
                // GET EXTENSION OF THE FILE
                $extension = $category->image->extension();
                // CREATE FILE NAME
                $filename = $newname.'.'.$extension;
                // DO UPLOAD
                $upload = $category->image->storeAs('categories', $filename);

                if(!$upload){
                    return redirect()
                            ->back()
                            ->with('Error', 'Upload Fail')
                            ->withInput();
                }
                
                $category->image = $filename;
                $category->slug = $newname;
                
            }

            $category->save();
        }
        
        \Session::flash('success', 'Category successfully registered');
        return Redirect::to('admin/categories');
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
        $category = Category::findOrFail($id);
        return view('admin/categories/edit', compact('category'));
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
       $category = Category::findOrFail($id);
       
       $this->validate($request,[
        'name' => 'required|min:6',
        'description' => 'required',
        'category_image' => 'mimes:jpeg,png,gif|max:4883',
       ]);

       $category->name = $request->input('name');
       $category->description = $request->input('description');

       if(Input::hasFile('category_image'))
       {
                // DELETE EXISTING FILE
                $oldfile = 'public/images/categories/'.$category->image;
                File::delete($oldfile);

                $category->image = Input::file('category_image');

                $name = $category->name.'-'.$category->id;
                
                $name = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", strtr(utf8_decode(trim($name)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );

                $newname = preg_replace('/[^A-Za-z0-9]/', "-", $name);
                $newname = strtolower($newname);
                
                // GET EXTENSION OF THE FILE
                $extension = $category->image->extension();
                // CREATE FILE NAME
                $filename = $newname.'.'.$extension;
                // DO UPLOAD
                $upload = $category->image->storeAs('categories', $filename);

                if(!$upload){
                    return redirect()
                            ->back()
                            ->with('Error', 'Upload Fail')
                            ->withInput();
                }

                $category->image = $filename;
                $category->slug = $newname;                
       }
       
       $category->update($request->all());
       
       \Session::flash('success', 'Category successfully updated');
       
       return Redirect::to('admin/categories/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // DELETE EXISTING FILE
        $oldfile = 'public/images/categories/'.$category->image;
        File::delete($oldfile);
        $category->delete();
        
        \Session::flash('success', 'Category successfully deleted');
        
        return Redirect::to('admin/categories');
    }
}
