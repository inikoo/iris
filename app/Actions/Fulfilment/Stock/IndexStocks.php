<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 22 Oct 2022 18:35:25 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Fulfilment\Stock;

use App\Actions\UI\WithInertia;
use App\Http\Resources\Fulfilment\StockResource;
use App\Models\Fulfilment\Stock;
use App\Models\Sales\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class IndexStocks
{
    use AsAction;
    use WithInertia;


    private Customer $customer;

    public function handle(): LengthAwarePaginator
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('stocks.code', 'LIKE', "$value%")
                    ->orWhere('stocks.description', 'LIKE', "%$value%");
            });
        });


        return QueryBuilder::for(Stock::class)
            ->defaultSort('stocks.code')
            ->select(['slug','code', 'stocks.id as id', 'description', 'stock_value', 'number_locations', 'quantity'])
            ->where('owner_type', 'Customer')->where('owner_id', $this->customer->id)
            ->leftJoin('stock_stats', 'stock_stats.stock_id', 'stocks.id')
            ->allowedSorts(['code', 'description', 'number_locations', 'number_locations', 'quantity'])
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
        return StockResource::collection($this->handle());
    }


    public function htmlResponse(LengthAwarePaginator $stocks)
    {
        return Inertia::render(
            'Inventory/Stocks',
            [
                'title'    => __('stocks'),
                'pageHead' => [
                    'title' => __('stocks'),
                ],
                'stocks' => StockResource::collection($stocks),


            ]
        )->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch()
                ->column(key: 'code', label: 'SKU', canBeHidden: false, sortable: true, searchable: true)
                ->column(key: 'description', label: __('description'), canBeHidden: false, sortable: true, searchable: true)
                ->column(key: 'quantity', label: __('stock'), canBeHidden: false, sortable: true)
                ->defaultSort('code');
        });
    }


}
