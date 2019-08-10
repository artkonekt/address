<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndicesToProvincesTable extends Migration
{
    public function up()
    {
        /** based on ISO 3166-2 https://en.wikipedia.org/wiki/ISO_3166-2 */
        Schema::table('provinces', function (Blueprint $table) {
            $table->index('code', 'provinces_code_index');
            $table->unique(['country_id', 'code'], 'provinces_country_id_code_index');
        });
    }

    public function down()
    {
        Schema::table('provinces', function (Blueprint $table) {
            $table->dropUnique('provinces_country_id_code_index');
            $table->dropIndex('provinces_code_index');
        });
    }
}
