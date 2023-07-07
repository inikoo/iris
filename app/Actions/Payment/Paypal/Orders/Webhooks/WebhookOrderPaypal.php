<?php

namespace App\Actions\Payment\Paypal\Orders\Webhooks;

use App\Actions\Payment\Paypal\Traits\WithPaypalConfiguration;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class WebhookOrderPaypal {
    use AsAction;
    use WithPaypalConfiguration;

    public function handle(array $objectData)
    {
        $orderId = $objectData['resource']['id'];
        $status  = $objectData['resource']['status'];

        // TODO Update the payment detail in database

        return $objectData;
    }

    public function asController(ActionRequest $request)
    {
        return $this->handle($request->all());
    }
}
