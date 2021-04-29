<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Build_order;
use App\Models\Part_order;
use App\Models\Address;
use Session;

class OrderController extends Controller
{
    public function index()
    {

        $build_orders = Build_order::withTrashed()->get();

        return view(
            'account.orders.profile-admin-orders',
            [
                'build_orders' => $build_orders
            ]
        );
    }
}
