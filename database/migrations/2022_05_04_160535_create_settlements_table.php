<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("zone_type")->nullable();
            $table->bigInteger("settlement_type_id")->unsigned()->index();
            $table->bigInteger("zip_code_id")->unsigned()->index();
            $table->timestamps();
            $table->foreign('settlement_type_id')->references('id')->on('settlement_types');
            $table->foreign('zip_code_id')->references('id')->on('zip_codes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settlements');
    }
}
