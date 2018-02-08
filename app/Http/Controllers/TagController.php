<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Tag;
use Session;
use DB;
use App\Quotation;

class TagController extends Controller
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
        $tags = Tag::all();
        return view('admin/tags/view')->withTags($tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/tags/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin/tags/edit', compact('tag'));
    }
    
    public function update($id, Request $request)
    {
       $this->validate($request, ['name' => 'required']);
       $tag = Tag::findOrFail($id);
       
       $tag->update($request->all());
       
       \Session::flash('success', 'Tag successfully updated');
       
       return Redirect::to('admin/tags/');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:255']);
        $tag = new Tag();
        $tag->name = Input::get('name');
        \Session::flash('success', 'Tag successfully registered');
        $tag->save();
        return Redirect::to('admin/tags');
    }
    
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->delete();
        \Session::flash('success', 'Tag successfully deleted');
        
        return Redirect::to('admin/tags');
    }

}
