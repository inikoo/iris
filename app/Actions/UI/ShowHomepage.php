<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sun, 16 Oct 2022 18:18:00 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

namespace App\Actions\UI;


use Inertia\Inertia;
use Lorisleiva\Actions\Concerns\AsAction;

class ShowHomepage
{
    use AsAction;

    //public function handle(User $user, string $title, string $body): Article
    //{
    //    return $user->articles()->create(compact('title', 'body'));
    //}

    public function asController(): \Inertia\Response
    {


        return Inertia::render('Webpage', [

        ]);
    }
}

