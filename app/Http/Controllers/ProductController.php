<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cat;
use App\User;
use Auth;
use Session;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::get();
        $product = Product::orderBy('created_at','desc')->paginate(5);
        return view('cpanel.product.index',['title'=>'Product'],compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Cat::all();
        return view('cpanel.product.create',['title'=>'Create Product'],compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'name' => 'required|min:5',
            'desc' => 'required|min:10',
            'country' => 'required|min:3',
            'year' => 'required|numeric|min:4',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif'
            ]);
            $product = new Product;
            $product->name = $request['name'];
            $product->desc = $request['desc'];
            $product->country = $request['country'];
            $product->year = $request['year'];
            $product->price = $request['price'];
            $product->status = $request['status'];
            $product->cat_id = $request->cat_id;
            $product->user_id = Auth::id();
            if($request->hasFile('image'))
            {
                $request->file('image');
                $name = time() . '.' .$request->file('image')->getClientOriginalExtension();
                //Storage::putFile('public',$name);
                $path = $request->image->storeAs('public/images', $name);
                $product->image = $path;
                $product->save();           
            }
            $product->save();
            Session::flash('success','Product Add');
            return redirect()->back();
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
        $cat = Cat::all();
        $product = Product::find($id);
        return view('cpanel.product.edit',compact('cat'))->withProduct($product);
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
        $this->Validate($request,[
            'name' => 'required|min:5',
            'desc' => 'required|min:10',
            'country' => 'required|min:3',
            'year' => 'required|numeric|min:4',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg,gif'
            ]);
            $product = Product::find($id);
            $product->name = $request->name;
            $product->desc = $request->desc;
            $product->country = $request->country;
            $product->year = $request->year;
            $product->price = $request->price;
            $product->status = $request->status;
            $product->cat_id = $request->cat_id;
            $product->image = $request->image;
            Session::flash('success','Product Updated');
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::flash('success','Product Deleted');
        return redirect()->back();
    }
}
