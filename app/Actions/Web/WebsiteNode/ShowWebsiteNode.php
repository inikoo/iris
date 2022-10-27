<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Tue, 18 Oct 2022 16:18:29 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\Web\WebsiteNode;


use App\Models\Web\Website;
use App\Models\Web\WebsiteNode;
use Inertia\Inertia;
use Inertia\Response;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowWebsiteNode
{
    use AsAction;

    public function handle(WebsiteNode $websiteNode): Response
    {

        return Inertia::render('Webpage', [

        ]);

    }

    public function asController(WebsiteNode $websiteNode): Response
    {

        return $this->handle($websiteNode);

    }

    public function home(): Response
    {
        //todo fetch website


       // $website=Website::find(config('website.id'));
       // $websiteNode=WebsiteNode::where('');
        return $this->handle();


    }

}

