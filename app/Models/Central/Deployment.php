<?php

namespace App\Models\Central;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

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
