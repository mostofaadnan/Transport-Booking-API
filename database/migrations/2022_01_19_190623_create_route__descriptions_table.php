<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRouteDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route__descriptions', function (Blueprint $table) {
            $table->id();
            $table->text("startting_point");
            $table->text("starting_station")->nullable();
            $table->text("ending_point");
            $table->text("ending_station")->nullable();
            $table->tinyInteger("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route__descriptions');
    }
}
