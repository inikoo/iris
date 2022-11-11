<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 16:25:53 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Fulfilment\Stock;

use App\Actions\UI\WithInertia;
use App\Http\Resources\Fulfilment\StockResource;
use App\Models\Fulfilment\Stock;
use App\Models\Sales\Customer;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class StoreStock
{
    use AsAction;
    use WithInertia;


    private Customer $customer;

    public function handle(Customer $customer, array $modelData)
    {

    }

    public function authorize(ActionRequest $request): bool
    {
        return
            (
            $request->user()->tokenCan('*')
            );
    }

    public function rules(ActionRequest $request): array
    {
        return [
            'code' => [
                'required',
                Rule::unique('stocks', 'code')->where(
                    fn($query) => $query->where('owner_type', 'Customer')->where('owner_id', $request->user()->customer->id)
                )
            ],
        ];
    }

    public function asController(ActionRequest $request)
    {
        $request->validate();

        return $this->handle($request->user()->customer, $request->validated());
    }


    public function jsonResponse()
    {
        return 'caca22';
    }


}
