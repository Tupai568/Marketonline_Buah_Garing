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
        $cart = session()->get('cart', []);
        $categories = Category::all();
        $categoriesToFetch = ['Buah', 'Sayuran'];
        $latestProducts = Product::with('category')->orderBy('created_at', 'desc')->take(8)->get();

        // Mengambil produk dengan kategori yang ditentukan
        $products = Product::with('category')
            ->whereHas('category', function ($query) use ($categoriesToFetch) {
                $query->whereIn('name', $categoriesToFetch);
            })->get()
            ->groupBy('category.name');

        $data = [
            "Title" => $title,
            "Total" => count($cart),
            "Categories" => $categories,
            "LatesProduct" => $latestProducts,
            "ProductBuah" => $products["Buah"] ?? collect(),
            "ProductSayuran" => $products["Sayuran"] ?? collect(),
        ];

        return view("index", $data);
    }

    public function cart()
    {
        // session()->flush();
        $title = "cart";
        $cart = session()->get('cart', []);

        $data = [
            "Title" => $title,
            "Total" => count($cart),
            "CartItems" => $cart
        ];

        return view("cart", $data);
    }
}
