<?php

namespace App\Actions\Payment\Paypal\Orders;

use App\Actions\Payment\Paypal\Traits\WithPaypalConfiguration;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreOrderToPaypal {
    use AsAction;
    use WithPaypalConfiguration;

    public string $commandSignature = 'paypal:checkout';
    public string $commandDescription = 'Checkout using paypal';

    public function handle(array $orderData)
    {
        $itemTotalAmount = 0;
        $discount = 0;
        $items = [];

        foreach ($orderData['items'] as $item) {
            $items[] = [
                "name" => $item['name'],
                "quantity" => $item['quantity'],
                "description" => $item['description'],
                "sku" => $item['sku'],
                "unit_amount" => [
                    "currency_code" => $orderData['currency_code'],
                    "value" => $item['amount']
                ]
            ];

            $itemTotalAmount += $item['amount'] * $item['quantity'];
        }

        $response = Http::withHeaders($this->headers())->post($this->url() . '/v2/checkout/orders', [
            "intent" => "CAPTURE",
            'purchase_units' => [
                [
                    "amount" => [
                        "currency_code" => $orderData['currency_code'],
                        "value" => $itemTotalAmount - $discount,
                        "breakdown" => [
                            "item_total" => [
                                "currency_code" => $orderData['currency_code'],
                                "value" => $itemTotalAmount
                            ]
                        ]
                    ],
                    'items' => $items
                ]
            ]
        ]);

        return $response->json();
    }

    public function asCommand()
    {
        $data = [
            "currency_code" => "USD",
            "items" => [
                [
                    "name" => "Aw France",
                    "quantity" => 2,
                    "description" => "Test",
                    "sku" => "AW-12332324343",
                    "amount" => 50
                ]
            ]
        ];

        dd($this->handle($data));
    }
}
