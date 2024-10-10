<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "home";
        $categories = Category::all();

        $data = [
            "Title" => $title,
            "Categories" => $categories
        ];
        return view("index", $data);
    }

    public function shop()
    {
        $title = "shop";

        $data = [
            "Title" => $title
        ];
        return view("shop", $data);
    }
}
