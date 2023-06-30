<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 18 Oct 2022 16:18:29 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Web\Webpage;

use App\Models\Web\Webpage;
use Inertia\Inertia;
use Inertia\Response;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowWebpage
{
    use AsAction;

    public function handle(?Webpage $webpage): Response
    {
        return Inertia::render('Webpage');
    }

    public function asController(Webpage $webpage): Response
    {
        return $this->handle($webpage);
    }

    public function home(): Response
    {
        return $this->handle(
            Webpage::where('website_id', config('website.id'))->where('purpose', 'home')->first()
        );
    }

}
