<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Wed, 21 Dec 2022 21:13:54 Malaysia Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Sales\Order;

use App\Actions\UI\WithInertia;
use App\Models\Marketing\Product;
use App\Models\Sales\Customer;
use App\Models\Web\WebUser;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;
use Lorisleiva\Actions\ActionRequest;
use Lorisleiva\Actions\Concerns\AsAction;


class StoreDropshippingOrderViaAurora
{
    use AsAction;
    use WithInertia;


    private Customer $customer;
    private string $productIDField;


    public function handle(WebUser $webUser, array $modelData): PromiseInterface|Response
    {


        $products=[];
        foreach(Arr::pluck($modelData['items'], 'quantity', $this->productIDField) as $productIDField=>$quantity){
            $product=Product::where($this->productIDField,$productIDField)->first();
            $products[$product->id]=[
                'quantity'=>$quantity
            ];
        }

        $modelData['items']=$products;

        $parameters = array_merge([
                                      'web_user_id' => $webUser->id
                                  ],
                                  $modelData
        );

        return Http::acceptJson()
            ->withToken(config('aiku.token'))
            ->post(
                config('aiku.url').'/api/iris/dropshipping/orders',
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
        $orderType = Arr::get($request->get('settings'), 'type', 'shop');

        $this->productIDField = $orderType=='fulfilment'?'code':'slug';

        if ($orderType == 'fulfilment' and Arr::exists($request->get('settings'), 'product_id_field')) {
            $this->productIDField = Arr::get($request->get('get'), 'product_id_field', 'code');
        }



        $rules = [
            'settings.type'                 => ['sometimes', Rule::in(['fulfilment', 'shop'])],
            'settings.product_id_field'     => ['sometimes', Rule::in(['code', 'slug'])],
            'order_number'                  => [
                'required',
                'alpha_dash',
                'max:255',
                Rule::unique('orders', 'customer_number')->where(function ($query) use ($request) {
                    return $query->where('customer_id', $request->user()->customer_id);
                }),

            ],
            'client_reference'              => ['required', 'string', 'max:255'],
            'email'                         => ['sometimes', 'email', 'max:320'],
            'company_name'                  => ['sometimes', 'string', 'max:255'],
            'contact_name'                  => ['sometimes', 'string', 'max:255'],
            'phone'                         => ['sometimes', 'string', 'max:255'],
            'delivery_address'              => ['required', 'array:address_line_1,address_line_2,sorting_code,postal_code,locality,dependant_locality,administrative_area,country_code'],
            'delivery_address.country_code' => ['required', 'string', 'size:2', 'exists:aiku_central.countries,code'],
            'items'                         => ['required', 'array'],
            'items.*'                       => ['required', "array:$this->productIDField,quantity"],
            "items.*.quantity"              => ['required', 'numeric', 'min:0', 'max:1000000','not_in:0'],
        ];

        if ($orderType == 'fulfilment') {
            $rules["items.*.$this->productIDField"] = [
                'required',
                'string','distinct',
                Rule::exists('products', $this->productIDField)->where(function ($query) use ($request) {
                    return $query->where('owner_type', 'Customer')->where('owner_id', $request->user()->customer_id);
                })
            ];
        } else {
            $rules["items.*.$this->productIDField"] = [
                'required',
                'string','distinct',
                Rule::exists('products', $this->productIDField)->where(function ($query) use ($request) {
                    return $query->where('owner_type', 'Customer')->where('owner_id', $request->user()->customer_id)
                        ->orWhere(function ($query) use ($request) {
                            $query->where('owner_type', 'Shop')
                                ->where('owner_id', $request->user()->customer->store_id);
                        });
                })
            ];
        }


        return $rules;
    }


    public function asController(ActionRequest $request): PromiseInterface|Response
    {
        $request->validate();

        return $this->handle($request->user(), $request->validated());
    }


}
