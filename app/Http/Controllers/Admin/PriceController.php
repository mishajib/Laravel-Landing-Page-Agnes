<?php

namespace App\Http\Controllers\Admin;

use App\Condition;
use App\Price;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('backend.pricing.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Condition::all();
        return view('backend.pricing.create', compact('features'));
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
            'title' => 'required|string',
            'features' => 'required',
            'price' => 'required|numeric|between:0,99.99'
        ]);
        $price = new Price();
        $price->title = $request->title;
        $price->price = $request->price;
        $price->save();

        $price->conditions()->attach($request->features);

        Toastr::success('Data Successfully Saved :)', 'success');
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
        $price = Price::findOrFail($id);
        return view('backend.pricing.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Price::findOrFail($id);
        $features = Condition::all();
        return view('backend.pricing.edit', compact('price', 'features'));
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
            'title' => 'required|string',
            'features' => 'required',
            'price' => 'required|numeric|between:0,99.99'
        ]);
        $price = Price::findOrFail($id);
        $price->title = $request->title;
        $price->price = $request->price;
        $price->save();

        $price->conditions()->sync($request->features);

        Toastr::success('Data Successfully Saved :)', 'success');
        return redirect(route('pricing.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $price = Price::findOrFail($id);
        $price->conditions()->detach();
        $price->delete();

        Toastr::success('Data Successfully Deleted :)', 'Success');
        return back();
    }
}
