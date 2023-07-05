<?php

namespace App\Http\Resources;

use App\Models\SysAdmin\Admin;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $code
 * @property mixed $created_at
 * @property mixed $updated_at
 * @property mixed $userable_type
 */
class SysUserResource extends JsonResource
{
    use WhenMorphToLoaded;

    public function toArray($request): array
    {
        return [
            'id'           => $this->id,
            'code'         => $this->code,
            'userable_type'=> $this->userable_type,
            'userable'     => $this->whenMorphToLoaded('userable', [
                Admin::class => AdminResource::class,
            ]),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
