<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Wed, 21 Dec 2022 16:16:17 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sales\Order;

use App\Actions\UI\WithInertia;
use App\Http\Resources\OrderResource;
use App\Models\CRM\Customer;
use App\Models\Sales\Order;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowOrder
{
    use AsAction;
    use WithInertia;


    private Customer $customer;


    public function authorize(ActionRequest $request): bool
    {

        return
            (
                $request->user()->tokenCan('*')
            );
    }

    public function asController(Order $order, ActionRequest $request): Order
    {

        $request->validate();


        return $order;
    }


    public function jsonResponse(Order $order): OrderResource
    {
        return new OrderResource($order);
    }


}
