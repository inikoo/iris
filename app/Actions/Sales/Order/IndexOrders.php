<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Wed, 21 Dec 2022 13:52:30 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sales\Order;

use App\Actions\UI\WithInertia;
use App\Http\Resources\OrderResource;
use App\Models\Sales\Customer;
use App\Models\Sales\Order;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IndexOrders
{
    use AsAction;
    use WithInertia;

    private Customer $customer;
    private int $perPage;

    public function handle(): LengthAwarePaginator
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('orders.number', 'LIKE', "$value%");
            });
        });


        return QueryBuilder::for(Order::class)
            ->defaultSort('orders.number')
            ->select(['slug', 'number', 'state', 'customer_client_id', 'customer_number','delivery_address_id',

                      'created_at', 'updated_at'])
            ->with('deliveryAddress')
            ->where('customer_id', $this->customer->id)
            ->allowedSorts(['number', 'state', 'created_at', 'updated_at', 'customer_number'])
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
        return OrderResource::collection($this->handle());
    }


    public function htmlResponse(LengthAwarePaginator $fulfilmentOrders)
    {
        return Inertia::render(
            'Fulfillment/Order',
            [
                'title'    => __('orders'),
                'pageHead' => [
                    'title' => __('orders'),
                ],
                'orders' => OrderResource::collection($fulfilmentOrders),


            ]
        )->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch()
                ->column(key: 'number', label: 'Number', canBeHidden: false, sortable: true, searchable: true)
                ->defaultSort('number');
        });
    }


}
