<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;
use Session;

class ConsoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consoles = Console::all();
        return view(
            'consoles.consoles',
            [
                'consoles' => $consoles
            ]
        );
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
            'console_name' =>'required',
            'console_price' => 'required|gt:0',
            'console_desc' => 'required'
        ]);

        $console = new Console();
        $console->console_name = $request->console_name;
        $console->price = $request->console_price;
        $console->description = $request->console_desc;
        $console->image = $request->console_image;
        $console->save();

        return redirect('/profile')->with('success', 'Console Item Added Successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Console $console)
    {

        $request->validate([
            'console_name' =>'required',
            'console_price' => 'required|gt:0',
            'console_desc' => 'required'
        ]);

        $console->console_name = $request->console_name;
        $console->price = $request->console_price;
        $console->description = $request->console_desc;
        $console->image = $request->console_image;
        $console->save();
        return redirect('/profile')->with('success', 'Console Item Updated Successfully');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Console $console)
    {
        $console->delete();
        return redirect('/profile')->with('success', 'Console Item Deleted Successfully');
    }

    // ADDED FOR RESTORE SOFT DELETES
    public function restore(int $id)
    {
        $deletedConsole = Console::onlyTrashed()->find($id);
        $deletedConsole->restore();
        return redirect('/profile')->with('success', 'Console Item Restored Successfully');
    }
}
