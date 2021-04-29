<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Console;
use App\Models\Part;
use App\Models\Address;
use App\Models\Category;
use App\Models\Build_order;
use App\Models\Part_order;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('user'))
        {
            $user_id = Session::get('user')->id;
            $user = User::find($user_id);

            if($user->role_id == 1)
            {
                $consoles = Console::withTrashed()->get();
                // $parts = Part::withTrashed()->get();
                $parts = Part::withTrashed()->paginate(8);
                $categories = Category::all();

                return view(
                    'account.profile',
                    [
                        'user' => $user,
                        'consoles' => $consoles,
                        'parts' => $parts,
                        'categories' => $categories
                    ]
                );
            }
            else
            {
                $userBuildOrders = Build_order::where('user_id', $user_id)->get();
                $partBuildOrders = Part_order::all();
                // dd($partBuildOrders);

               
                $defAddress = Address::where('user_id', $user_id)->where('status', 'true')->first();
                $userAddresses = Address::where('user_id', $user_id)->get();
                return view(
                    'account.profile',
                    [
                        'user' => $user,
                        'defAddress' => $defAddress,
                        'addresses' => $userAddresses,
                        'userBuildOrders' => $userBuildOrders,
                        'partBuildOrders' => $partBuildOrders
                    ]
                );
            }
        } 
        else 
        {
            return redirect('/login');
        }
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
        //
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
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
