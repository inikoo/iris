<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Mon, 28 Nov 2022 09:29:28 Central Indonesia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Fulfilment\FulfilmentOrder;

use App\Actions\UI\WithInertia;
use App\Http\Resources\Fulfilment\FulfilmentOrderResource;
use App\Models\Fulfilment\FulfilmentOrder;
use App\Models\Sales\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class IndexFulfilmentOrders
{
    use AsAction;
    use WithInertia;


    private Customer $customer;

    public function handle(): LengthAwarePaginator
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('fulfilment_orders.number', 'LIKE', "$value%");
            });
        });


        return QueryBuilder::for(FulfilmentOrder::class)
            ->defaultSort('fulfilment_orders.number')
            ->select(['slug','number', 'state', 'customer_client_id', 'created_at', 'updated_at'])
            ->where('customer_id', $this->customer->id)
            ->allowedSorts(['number', 'state', 'created_at', 'updated_at'])
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

        return $this->handle();
    }


    public function jsonResponse(): AnonymousResourceCollection
    {
        return FulfilmentOrderResource::collection($this->handle());
    }


    public function htmlResponse(LengthAwarePaginator $fulfilmentOrders)
    {
        return Inertia::render(
            'Fulfillment/Orders',
            [
                'title'             => __('orders'),
                'pageHead'          => [
                    'title' => __('orders'),
                ],
                'fulfillmentOrders' => FulfilmentOrderResource::collection($fulfilmentOrders),


            ]
        )->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch()
                ->column(key: 'number', label: 'Number', canBeHidden: false, sortable: true, searchable: true)
                ->defaultSort('number');
        });
    }


}
