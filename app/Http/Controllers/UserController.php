<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\User;
use Session;
use DB;
use App\Quotation;

class UserController extends Controller
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
        $users = User::all();
        return view('admin/users/view')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'cpf' => 'required',
            'cep' => 'required',
            'estate' => 'required',
            'city' => 'required',
            'address' => 'required'

        ]);
        $password =  Input::get('password');
        $passwordconfirm = Input::get('password-confirm');
        $user = new User();
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        // PASSWORD HERE
        if($password == $passwordconfirm)
        {
            $user->password = bcrypt($password);
        }
        $user->cpf = Input::get('cpf');
        $user->birth = Input::get('birth');
        $user->gender = Input::get('sex');
        $user->phone = Input::get('phone');
        $user->cep = Input::get('cep');
        $user->estate = Input::get('estate');
        $user->city = Input::get('city');
        $user->address = Input::get('address');
        $user->newsletter = Input::get('newsletter');
        
        \Session::flash('success', 'Customer successfully registered');
        $user->save();
        return Redirect::to('admin/users');
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
        $user = User::findOrFail($id);
        return view('admin/users/edit', compact('user'));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'cep' => 'required',
            'estate' => 'required',
            'city' => 'required',
            'address' => 'required'

        ]);

       $user = User::findOrFail($id);
       
       if ( isset($request->password)) {
            $user->update($request->all());
       } else {
            $user->update($request->except('password'));
       }
       
       \Session::flash('success', 'User successfully updated');
       
       return Redirect::to('admin/users/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        \Session::flash('success', 'User successfully deleted');
        
        return Redirect::to('admin/users');
    }
}
