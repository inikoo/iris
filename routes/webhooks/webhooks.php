<?php
/*
 * Author: Artha <artha@aw-advantage.com>
 * Created: Fri, 07 Jul 2023 13:26:25 Central Indonesia Time, Sanur, Bali, Indonesia
 * Copyright (c) 2023, Raul A Perusquia Flores
 */


use App\Actions\Payment\Paypal\Orders\Webhooks\WebhookOrderPaypal;

Route::post('/paypal/order', WebhookOrderPaypal::class);
