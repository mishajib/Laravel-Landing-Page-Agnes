<?php

namespace App\Http\Controllers\Admin;

use App\Condition;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PriceFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Condition::all();
        return view('backend.pricing-feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pricing-feature.create');
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
            'title' => 'required|string'
        ]);

        $feature = new Condition();
        $feature->feature = $request->title;
        $feature->save();

        Toastr::success('Data Successfully Saved :)', 'Success');
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
        $feature = Condition::findOrFail($id);
        return view('backend.pricing-feature.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Condition::findOrFail($id);
        return view('backend.pricing-feature.edit', compact('feature'));
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
            'title' => 'required|string'
        ]);

        $feature = Condition::findOrFail($id);
        $feature->feature = $request->title;
        $feature->save();

        Toastr::success('Data Successfully Updated :)', 'Success');
        return redirect(route('pricing-feature.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Condition::findOrFail($id);
        $feature->delete();

        Toastr::success('Data Successfully Deleted :)', 'Success');
        return back();
    }
}
