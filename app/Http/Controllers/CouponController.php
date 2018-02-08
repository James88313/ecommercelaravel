<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Coupon;
use Session;
use DB;
use App\Quotation;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin/coupons/view')->withCoupons($coupons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/coupons/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|max:255']);
        $coupon = new Coupon();
        $coupon->name = Input::get('name');
        $coupon->code = Input::get('code');
        $coupon->discount = Input::get('discount');
        \Session::flash('success', 'Coupon successfully registered');
        $coupon->save();
        return Redirect::to('admin/coupons');
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
        $coupon = Coupon::findOrFail($id);
        return view('admin/coupons/edit', compact('coupon'));
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
       $this->validate($request, ['name' => 'required', 'code' => 'required', 'discount' => 'required']);
       $coupon = Coupon::findOrFail($id);
       
       $coupon->update($request->all());
       
       \Session::flash('success', 'Coupon successfully updated');
       
       return Redirect::to('admin/coupons/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        \Session::flash('success', 'Coupon successfully deleted');
        
        return Redirect::to('admin/coupons');
    }
}
