<?php
/*
 * Author: Raul Perusquia <raul@inikoo.com>
 * Created: Tue, 10 Jan 2023 14:26:36 Malaysia Time, Kuala Lumpur, Malaysia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */

namespace App\Actions\Dropshipping\CustomerClient;

use App\Actions\UI\WithInertia;
use App\Http\Resources\CustomerClientResource;
use App\Models\CRM\Customer;
use App\Models\Dropshipping\CustomerClient;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IndexCustomerClients
{
    use AsAction;
    use WithInertia;

    private Customer $customer;
    private int $perPage;

    public function handle(): LengthAwarePaginator
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('customer_client.reference', 'LIKE', "$value%");
            });
        });


        return QueryBuilder::for(CustomerClient::class)
            ->defaultSort('reference')
            ->with('deliveryAddress')
            ->select(['slug', 'delivery_address_id','reference','name','contact_name','email','phone', 'created_at', 'updated_at'])
            ->where('customer_id', $this->customer->id)
            ->allowedSorts(['reference', 'name', 'created_at', 'updated_at', 'email'])
            ->allowedFilters([$globalSearch])
            ->paginate($this->perPage ?? config('ui.table.records_per_page'))
            ->withQueryString();
    }

    public function authorize(ActionRequest $request): bool
    {
        return
            (
                $request->user()->tokenCan('*')
            );
    }

    public function asController(ActionRequest $request): LengthAwarePaginator
    {
        $request->validate();

        $this->customer = $request->user()->customer;
        if ($request->wantsJson()) {
            $this->perPage = 500;
        }

        return $this->handle();
    }


    public function jsonResponse(): AnonymousResourceCollection
    {
        return CustomerClientResource::collection($this->handle());
    }


    public function htmlResponse(LengthAwarePaginator $customerClients)
    {
        return Inertia::render(
            'Dropshipping/Clients',
            [
                'title'    => __('clients'),
                'pageHead' => [
                    'title' => __('clients'),
                ],
                'customer_clients' => CustomerClientResource::collection($customerClients),


            ]
        )->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch()
                ->column(key: 'reference', label: 'Reference', canBeHidden: false, sortable: true, searchable: true)
                ->defaultSort('number');
        });
    }


}
