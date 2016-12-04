<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Konekt\Address\Models\NameOrder;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname')->comment('First name');
            $table->string('lastname')->comment('Last Name');
            $table->string('email');
            $table->string('phone', 22)->nullable();
            $table->string('nin', 21)->nullable()->comment('National Identification Number');
            $table->enum('nameorder', array_values(NameOrder::toArray()))->comment(NameOrder::__default);
            $table->timestamps();

            $table->foreign('country_id')
                  ->references('id')
                  ->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
