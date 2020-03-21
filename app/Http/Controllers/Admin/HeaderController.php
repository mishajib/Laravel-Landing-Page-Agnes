<?php

namespace App\Http\Controllers\Admin;

use App\Header;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $headers = Header::latest()->get();
        return view('backend.header.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.header.create');
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
           'description' => 'required|string'
       ]);

       $header = new Header();
       $header->title = $request->title;
       $header->description = $request->description;
       $header->save();

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
        $header = Header::findOrFail($id);
        return view('backend.header.show', compact('header'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $header = Header::findOrFail($id);
        return view('backend.header.edit', compact('header'));

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
            'description' => 'required|string'
        ]);

        $header = Header::findOrFail($id);
        $header->title = $request->title;
        $header->description = $request->description;
        $header->save();

        Toastr::success('Data Successfully Updated :)', 'Success');
        return redirect(route('header.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $header = Header::findOrFail($id);
        $header->delete();

        Toastr::success('Data Successfully Deleted :)', 'Success');
        return back();
    }
}
