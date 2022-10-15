<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 11:47:55 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */


namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Relations\Relation;

trait WhenMorphToLoaded
{
    public function whenMorphToLoaded($name, $map)
    {
        return $this->whenLoaded($name, function () use ($name, $map) {
            $morphType = $name . '_type';
            $morphAlias = $this->resource->$morphType;
            $morphClass = Relation::getMorphedModel($morphAlias);
            $morphResourceClass = $map[$morphClass];
            return new $morphResourceClass($this->resource->$name);
        });
    }
}
