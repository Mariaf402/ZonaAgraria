<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use App\Category;
use App\Product;


class IndexController extends Controller
{
    public function index(){
        

    	// Get all Products
		$productsAll = Product::inRandomOrder()->where('status',1)->where('feature_item',1)->get();

    	// Get All Categories and Sub Categories
    	$categories = Category::with('categories')->where(['parent_id' => 0])->get();
		$categories = json_decode(json_encode($categories));

        $banners = Banner::where('status', '1')->get();
    	return view('index')->with(compact('productsAll','categories','banners'));





}
}
