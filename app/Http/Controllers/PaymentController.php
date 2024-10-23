<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\CartController;

class PaymentController extends Controller
{
    public function ceckout(Request $request)
    {
        $validateData = $request->validate([
            "customer_name" => "required|string",
            "customer_phone" => "required|numeric",
            "customer_address" => "required|string"
        ]);
        $validateData["total_amount"] = CartController::totalAmount();

        $order = Order::create($validateData);

        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized  = true;
        Config::$is3ds  = true;

        // Buat array untuk pembayaran
        $transactionData = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => floatval($order->total_amount),
            ],
            'customer_details' => [
                'name' => $order->customer_name,
                'phone' => $order->customer_phone,
                'address' => $order->customer_address
            ],
        ];

        // Dapatkan URL payment
        try {
            $title = "ceckout";
            $cart = session()->get('cart', []);
            $snapToken = Snap::getSnapToken($transactionData);

            $data = [
                "Title" => $title,
                "CartItems" => $cart,
                "Total" => count($cart),
                "snapToken" => $snapToken,
                "TotalKeseluruhan" => CartController::totalAmount(),
            ];
            return view("payment", $data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
