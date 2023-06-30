<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Fri, 11 Nov 2022 16:25:53 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Fulfilment\Stock;

use App\Actions\UI\WithInertia;
use App\Models\Sales\Customer;
use App\Models\Web\WebUser;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreStock
{
    use AsAction;
    use WithInertia;


    private Customer $customer;

    public function handle(WebUser $webUser, array $modelData): PromiseInterface|Response
    {
        $parameters = array_merge(
            [
                                      'web_user_id' => $webUser->id
                                  ],
            $modelData
        );

        return Http::acceptJson()
            ->withToken(config('aiku.token'))
            ->post(
                config('aiku.url').'/api/iris/stocks',
                $parameters
            );
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
            'code'        => [
                'required',
                Rule::unique('stocks', 'code')->where(
                    fn ($query) => $query->where('owner_type', 'Customer')->where('owner_id', $request->user()->customer->id)
                )
            ],
            'description' => ['sometimes', 'nullable', 'string', 'max:10000']

        ];
    }


    public function asController(ActionRequest $request): PromiseInterface|Response
    {
        $request->validate();

        return $this->handle($request->user(), $request->validated());
    }





}
