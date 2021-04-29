<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Session::has('user')) {
            $user_id = Session::get('user')->id;
            $user = User::find($user_id);
            $addresses = Address::where('user_id', $user_id)->get();

            //dd($addresses);
            return view(
                'account.address.profile-user-address',
                [
                    'user' => $user,
                    'addresses' => $addresses
                ]
            );
        } else {
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
        $request->validate([
            'firstname' =>'required',
            'lastname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required',
            'postal_code' => 'required|digits_between:4,5',
            'phone' => 'required|digits:11'
        ]);
        
        // dd($request);

        $user_id = Session::get('user')->id;
        
        $findDefault = Address::where('user_id', $user_id)
            ->where('status', $request->isCheckedDefault)->first();

        if($request->isCheckedDefault == "true")
        {
            $address = new Address();
            $address->user_id = $user_id;
            $address->first_name = $request->firstname;
            $address->last_name = $request->lastname;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->country = $request->country;
            $address->province = $request->province;
            $address->postal_code = $request->postal_code;
            $address->phone_number = $request->phone;
            $address->status = $request->isCheckedDefault;
            $address->save();

            if($findDefault)
            {
                $findDefault->status = "false";
                $findDefault->update();
            }

            // return redirect('/addresses')->with('success', 'Address Added Successfully');
            return redirect()->back()->with('success', 'Address Added Successfully');
        }
        else
        {
            $address = new Address();
            $address->user_id = $user_id;
            $address->first_name = $request->firstname;
            $address->last_name = $request->lastname;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->country = $request->country;
            $address->province = $request->province;
            $address->postal_code = $request->postal_code;
            $address->phone_number = $request->phone;
            $address->save();

            // return redirect('/addresses')->with('success', 'Address Added Successfully');
            return redirect()->back()->with('success', 'Address Added Successfully');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id, Address $address)
    {
        $request->validate([
            'firstname' =>'required',
            'lastname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required',
            'postal_code' => 'required|digits_between:4,5',
            'phone' => 'required|digits:11'
        ]);

        $user_id = Session::get('user')->id;
        $findDefault = Address::where('user_id', $user_id)
            ->where('status', $request->isCheckedDefault)->first();

        if($request->isCheckedDefault == "true")
        {
            $address->user_id = $user_id;
            $address->first_name = $request->firstname;
            $address->last_name = $request->lastname;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->country = $request->country;
            $address->province = $request->province;
            $address->postal_code = $request->postal_code;
            $address->phone_number = $request->phone;
            $address->status = $request->isCheckedDefault;
            $address->save();

            if($findDefault)
            {
                $findDefault->status = "false";
                $findDefault->update();
            }
            // return redirect('/addresses')->with('success', 'Address Updated Successfully');
            return redirect()->back()->with('success', 'Address Updated Successfully');
        }
        else
        {
            $address->user_id = $user_id;
            $address->first_name = $request->firstname;
            $address->last_name = $request->lastname;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->country = $request->country;
            $address->province = $request->province;
            $address->postal_code = $request->postal_code;
            $address->phone_number = $request->phone;
            $address->save();
            // return redirect('/addresses')->with('success', 'Address Updated Successfully');
            return redirect()->back()->with('success', 'Address Updated Successfully');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, Address $address)
    {
        $findDefault = Address::where('id', $address->id)
            ->where('status', 'true')->first();
        // dd($findDefault);
        if($findDefault)
        {
            // return redirect('/addresses')->with('warning', 'Unable to delete default address');
            return redirect()->back()->with('warning', 'Unable to delete default address');
        }
        else
        {
            $address->delete();
            // return redirect('/addresses')->with('success', 'Address Deleted Successfully');
            return redirect()->back()->with('success', 'Address Deleted Successfully');
        }
    }
}
