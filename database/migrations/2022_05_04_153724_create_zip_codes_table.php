<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zip_codes', function (Blueprint $table) {
            $table->id();
            $table->string("zip_code")->unique();
            $table->string("locality")->nullable();
            $table->bigInteger("federal_entity_id")->unsigned()->index();
            $table->bigInteger("municipality_id")->unsigned()->index();
            $table->timestamps();
            $table->foreign('federal_entity_id')->references('id')->on('federal_entities');
            $table->foreign('municipality_id')->references('id')->on('municipalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zip_codes');
    }
}
