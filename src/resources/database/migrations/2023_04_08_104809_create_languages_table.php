<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up()
    {
        if (!Schema::hasTable('languages')) {
            Schema::create('languages', function (Blueprint $table) {
                $table->char('id', 2);
                $table->string('name');
                $table->string('native_name');

                $table->timestamps();

                $table->primary('id');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('languages');
    }
};
