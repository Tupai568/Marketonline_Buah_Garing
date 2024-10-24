<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Models\OrderItem;

class PaymentController extends Controller
{
    public function ceckout(Request $request)
    {
        $validateData = $request->validate([
            "customer_name" => "required|string",
            "customer_phone" => "required|numeric",
            "customer_address" => "required|string",
            "customer_city" => "required|string",
            "customer_postal_code" => "required"
        ]);
        $validateData["total_amount"] = CartController::totalAmount();

        $order = Order::create($validateData);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds  = true;


        $cart = session()->get('cart', []);
        $subtotal = 7000;

        foreach ($cart as $key) {
            $totalHarga = $key["price"] * $key["quantity"];
            $subtotal += $totalHarga;
            OrderItem::create([
                "order_id" => $order->id,
                "product_id" => $key["id"],
                "quantity" => $key["quantity"],
                "price" => $totalHarga
            ]);
        }

        
        // Buat array untuk pembayaran
        $transactionData = [
            'transaction_details' => [
                'order_id' => "#a".$order->id,
                'gross_amount' => floatval($order->total_amount),
            ],
            'customer_details' => [
                'first_name' => $order->customer_name,
                'phone' => $order->customer_phone,
                'billing_address' => [
                    'address' => $order->customer_address,    // Alamat lengkap
                    'city' => $order->customer_city,          // Kota
                    'postal_code' => $order->customer_postal_code, // Kode pos
                ]
            ],
            'item_details' => [] // Inisialisasi item_details
        ];
            // Ambil order dengan item dan produk
            $orderWithItems = Order::with(['orderItems.product'])->find($order->id);

        // Mengisi item_details dengan data produk
        foreach ($orderWithItems->orderItems as $item) {
            $transactionData['item_details'][] = [
                'id' => $item->product->id, // ID produk
                'name' => $item->product->name, // Nama produk
                'price' => $item->product->price, // Harga produk
                'subtotal' => $item->price, // Harga produk
                'quantity' => $item->quantity, // Kuantitas produk
            ];
        }

        // Menambahkan detail ongkir
        $ongkir = 7000; // Misalkan ongkir adalah 7000
        $transactionData['item_details'][] = [
            'id' => 'ongkir', // Anda bisa memberi ID unik atau 'ongkir'
            'name' => "Ongkir", // Nama untuk ongkir
            'price' => $ongkir, // Harga ongkir
            'subtotal' => $ongkir, // Total ongkir
            'quantity' => 1, // Kuantitas untuk ongkir (biasanya 1)
        ];

        // Dapatkan URL payment
        try {
            $title = "ceckout";
            $cart = session()->get('cart', []);
            $snapToken = Snap::getSnapToken($transactionData);

            $data = [
                "Title" => $title,
                "Total" => count($cart),
                "subTotal" => $subtotal,
                "snapToken" => $snapToken,
                "Orders" => $orderWithItems,
                "TotalKeseluruhan" => CartController::totalAmount(),
            ];

            session()->flush();
            return view("payment", $data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
