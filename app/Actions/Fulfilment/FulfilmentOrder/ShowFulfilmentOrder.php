<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Thu, 01 Dec 2022 10:57:29 Central Indonesia Time, Kuta, Bali, Indonesia
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Fulfilment\FulfilmentOrder;

use App\Actions\UI\WithInertia;
use App\Http\Resources\Fulfilment\FulfilmentOrderResource;
use App\Models\Fulfilment\FulfilmentOrder;
use App\Models\Sales\Customer;

use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;


class ShowFulfilmentOrder
{
    use AsAction;
    use WithInertia;


    private Customer $customer;


    public function authorize(ActionRequest $request, FulfilmentOrder $fulfilmentOrder): bool
    {
        return
            (
                $request->user()->tokenCan('*') and $fulfilmentOrder->customer_id == $request->user()->customer_id
            );
    }

    public function asController(FulfilmentOrder $fulfilmentOrder, ActionRequest $request): FulfilmentOrder
    {
        $request->validate();


        return $fulfilmentOrder;
    }


    public function jsonResponse(FulfilmentOrder $fulfilmentOrder): FulfilmentOrderResource
    {
        return new FulfilmentOrderResource($fulfilmentOrder);
    }


}
