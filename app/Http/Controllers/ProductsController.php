<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rows'] = Product::all();
        return view('product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'sku_number' => 'required',
            'part_number' => 'required',
        ]);
        $row = new Product;
        $row->name = $request->name;
        $row->sku_number = $request->sku_number;
        $row->part_number = $request->part_number;
        $row->description = $request->description;
        $row->specification = $request->specification;
        // dd($request->hasFile('file'));
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/product/');
            $image->move($destinationPath, $name);
            $row->image = '/storage/product/'.$name;
        }
        $check = $row->save();
        if($check) {
            session()->flash('alert-success', 'Successfully updated');
        }else {
            session()->flash('alert-danger', ' can not be updated');
        }
        return back();
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
        $row = Product::findOrFail($id);
        // dd($row);
        return view('product.edit', compact('row'));

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
        $validatedData = $request->validate([
            'name' => 'required|max:255',

            'description' => 'required',
            'sku_number' => 'required',
            'part_number' => 'required',
        ]);
        $row = Product::findOrFail($id);
        $row->name = $request->name;
        $row->sku_number = $request->sku_number;
        $row->part_number = $request->part_number;
        $row->description = $request->description;
        $row->specification = $request->specification;
        // dd($request->hasFile('file'));
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/product/');
            $image->move($destinationPath, $name);
            $row->image = '/storage/product/'.$name;
        }
        $check = $row->save();
        if($check) {
            session()->flash('alert-success', 'Successfully updated');
        }else {
            session()->flash('alert-danger', ' can not be updated');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return back();
    }
}
