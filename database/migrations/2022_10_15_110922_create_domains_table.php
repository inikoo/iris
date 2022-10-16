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

    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('url')->unique();
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('website_id');

            $table->timestampsTz();
        });
    }


    public function down()
    {
        Schema::dropIfExists('domains');
    }
};
