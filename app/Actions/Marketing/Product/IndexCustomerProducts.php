<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Wed, 14 Dec 2022 14:26:44 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Marketing\Product;

use App\Actions\UI\WithInertia;
use App\Http\Resources\Fulfilment\CustomerProductResource;
use App\Models\Marketing\Product;
use App\Models\Sales\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class IndexCustomerProducts
{
    use AsAction;
    use WithInertia;


    private Customer $customer;
    private int $perPage;

    public function handle(): LengthAwarePaginator
    {
        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                $query->where('products.code', 'LIKE', "$value%")
                    ->orWhere('products.name', 'LIKE', "%$value%");
            });
        });


        return QueryBuilder::for(Product::class)
            ->defaultSort('products.code')
            ->select(['slug','code', 'name', 'description'])
            ->where('owner_type', 'Customer')->where('owner_id', $this->customer->id)
            ->leftJoin('product_stats', 'product_stats.product_id', 'products.id')
            ->allowedSorts(['code', 'name'])
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

        // Todo investigate if this works for Inertia
        if ($request->wantsJson()) {
            $this->perPage=500;
        }

        return $this->handle();
    }


    public function jsonResponse(): AnonymousResourceCollection
    {
        return CustomerProductResource::collection($this->handle());
    }


    public function htmlResponse(LengthAwarePaginator $products)
    {
        return Inertia::render(
            'Fulfilment/CustomerProducts',
            [
                'title' => __('products'),
                'pageHead' => [
                    'title' => __('products'),
                ],
                'products' => CustomerProductResource::collection($products),


            ]
        )->table(function (InertiaTable $table) {
            $table
                ->withGlobalSearch()
                ->column(key: 'code', label: 'code', canBeHidden: false, sortable: true, searchable: true)
                ->column(key: 'name', label: __('name'), canBeHidden: false, sortable: true, searchable: true)
                ->defaultSort('code');
        });
    }


}
