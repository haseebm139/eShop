<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $featured_product = Product::where('trending','1')->take(15)->get();
        return view('frontend.index', compact('featured_product'));
    }

    public function category(){
        $category = Category::where('status',1)->get();
        return view('frontend.category',compact('category'));
    }
}
