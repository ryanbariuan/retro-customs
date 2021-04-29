<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;
use App\Models\Part;
use App\Models\User;
use App\Models\Build_order;
use App\Models\Part_order;
use App\Models\Category;
use Session;

class BuildOrderController extends Controller
{
    public function index(int $id)
    {
        // dd($id);

        if(Session::has('user')){
            $user_id = Session::get('user')->id;
            $user = User::find($user_id);
            $console = Console::find($id);
            $buttons = Part::where('console_id', $id)->where('category_id', 1)->get();
            $lenses = Part::where('console_id', $id)->where('category_id', 2)->get();
            $screens = Part::where('console_id', $id)->where('category_id', 3)->get();
            $shells = Part::where('console_id', $id)->where('category_id', 4)->get();
            $batteries = Part::where('console_id', $id)->where('category_id', 5)->get();

            return view(
                'consoles.build-order',
                [
                    'user' => $user,
                    'console' => $console,
                    'buttons' => $buttons,
                    'lenses' => $lenses,
                    'screens' => $screens,
                    'shells' => $shells,
                    'batteries' => $batteries
                ]
            );
        }
        else
        {
            return redirect('/login')->with('info', 'Please login to your account to view customization');
        }

    }
    
    // STORE
    public function store(Request $request, Console $id)
    {
        // dd($request->parts);
        // dd($id->id);

        $user_id = Session::get('user')->id;
        $user = User::find($user_id);
        $build = new Build_order();
        $build->console_id = $id->id;
        $build->user_id = $user_id;
        $build->total_price = $id->price + $request->extraPriceTotal;
        $build->save();

        foreach($request->parts as $partID){
            if($partID)
            {
                $part_order = new Part_order();
                $part_order->build_order_id = $build->id;
                $part_order->part_id = $partID;
                $part_order->save();
            }
        }

        return redirect('/profile')->with('success', 'Build Order successfully created.');
       
    }


}
