<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MercadoPagoController extends Controller
{
    public function show(){
        $productosCheckout = Producto::whereIn('producto_id', [1,2])->get();

        $items = $productosCheckout->map(fn(Producto $productoCheckout) =>[
            'title' => $productoCheckout->nombre,
            'quantity' => 1,
            'unit_price' => (string) $productoCheckout->precio,
        ])->all();

        $payload = [
            'type' => 'online',
            'processing_mode' => 'manual',
            'total_amount' => (string) $productosCheckout->sum('precio'),
            'external_reference' => 'kanso',
            'payer' => [
                'email' => Auth::user()->email,
            ],
            'items' => $items,
        ];

        $ch = curl_init('https://api.mercadopago.com/v1/orders');

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . config('mercadoPago.tokenAcceso'),
                'Content-Type: application/json',
                'X-idempotency-Key: ' . bin2hex(random_bytes(16)),
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_SSL_VERIFYPEER => false,
        ]);

        $response = curl_exec($ch);

        $response = json_decode($response, true);

        $checkout_url = $response['checkout_url'];

        return view('mp.checkoutMp', compact('productosCheckout', 'checkout_url'));
    }
}
