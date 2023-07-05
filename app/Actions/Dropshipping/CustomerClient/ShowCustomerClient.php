<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Tue, 10 Jan 2023 15:48:50 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Actions\Dropshipping\CustomerClient;

use App\Actions\UI\WithInertia;
use App\Http\Resources\CustomerClientResource;
use App\Models\CRM\Customer;
use App\Models\Dropshipping\CustomerClient;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowCustomerClient
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

    public function asController(CustomerClient $customerClient, ActionRequest $request): CustomerClient
    {
        $request->validate();
        $customerClient->load('deliveryAddress');


        return $customerClient;
    }


    public function jsonResponse(CustomerClient $customerClient): CustomerClientResource
    {
        return new CustomerClientResource($customerClient);
    }


}
