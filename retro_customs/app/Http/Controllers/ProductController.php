<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Console;
use App\Models\Part;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $parts = Part::paginate(6);

        return view('products.product', 
            [
                'categories' => $categories,
                'parts' => $parts
            ]
        );
    }

    public function filter(Request $request)
    {
        $categories = Category::all();

        if($request->part_category != "")
        {
            $parts = Part::where('category_id', $request->part_category)->paginate(6);
            $parts->appends($request->all());
        }
        else
        {
            $parts = Part::paginate(6);
        }

        return view('products.product', 
            [
                'categories' => $categories,
                'parts' => $parts
            ]
        );

    }



}
