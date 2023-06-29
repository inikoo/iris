<?php
/*
 *  Author: Raul Perusquia <raul@inikoo.com>
 *  Created: Sat, 15 Oct 2022 12:09:33 British Summer Time, Sheffield, UK
 *  Copyright (c) 2022, Raul A Perusquia Flores
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('instances', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('url')->unique();
            $table->unsignedSmallInteger('tenant_id');
            $table->unsignedSmallInteger('website_id');
            $table->unsignedSmallInteger('shop_id');
            $table->unsignedSmallInteger('domain_id');
            $table->timestampsTz();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('instances');
    }
};
