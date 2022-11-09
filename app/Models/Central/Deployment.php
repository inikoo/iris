<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * App\Models\Central\Deployment
 *
 * @property int $id
 * @property string $version
 * @property string $hash
 * @property string $state
 * @property array $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $skip_build
 * @property-read mixed $skip_composer_install
 * @property-read mixed $skip_npm_install
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Deployment whereVersion($value)
 * @mixin \Eloquent
 */
class Deployment extends Model
{
    protected $guarded = [];
    protected $attributes = [
        'data' => '{}',
    ];
    protected $casts = [
        'data' => 'array'
    ];

    protected $appends = ['skip_build','skip_npm_install','skip_composer_install'];

    public function getSkipComposerInstallAttribute(){
        return Arr::get($this->data,'skip.composer_install',false);
    }
    public function getSkipNpmInstallAttribute(){
        return Arr::get($this->data,'skip.npm_install',false);
    }
    public function getSkipBuildAttribute(){
        return Arr::get($this->data,'skip.build',false);
    }
}
