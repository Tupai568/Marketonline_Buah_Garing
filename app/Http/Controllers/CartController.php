<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('id');
        $product = Product::find($productId);
        $harga = floatval(str_replace('.', '', $product->price));

        // Logic untuk menambahkan produk ke keranjang
        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            $cart[$productId]['total_amount'] += $harga;
        } else {
            $cart[$productId] = [
                'image' => $product->image_url,
                'name' => $product->name,
                'total_amount' => $harga,
                'quantity' => 1,
                'price' => $product->price,
            ];
        }

        session()->put('cart', $cart);

        return response()->json([
            'total' => count($cart),
            'items' => array_values($cart) // Mengembalikan daftar produk di keranjang
        ]);
    }
}
