<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'part_name' =>'required',
            'part_price' => 'required|gt:0',
            'part_desc' => 'required'
        ]);

        $part = new Part();
        $part->part_name = $request->part_name;
        $part->console_id = $request->console;
        $part->category_id = $request->category;
        $part->price = $request->part_price;
        $part->description = $request->part_desc;
        $part->image = $request->part_image;
        $part->save();

        return redirect('/profile')->with('success', 'Part Item Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {

        $request->validate([
            'part_name' =>'required',
            'part_price' => 'required|gt:0',
            'part_desc' => 'required'
        ]);
        
        $part->part_name = $request->part_name;
        $part->console_id = $request->console;
        $part->category_id = $request->category;
        $part->price = $request->part_price;
        $part->description = $request->part_desc;
        $part->image = $request->part_image;
        $part->save();

        return redirect('/profile')->with('success', 'Part Item Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        $part->delete();
        return redirect('/profile')->with('success', 'Part Item Deleted Successfully');
    }

    // ADDED FOR RESTORE SOFT DELETES
    public function restore(int $id)
    {
        $deletedPart = Part::onlyTrashed()->find($id);
        $deletedPart->restore();
        return redirect('/profile')->with('success', 'Part Item Restored Successfully');
    }
}
