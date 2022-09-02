<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_infos', function (Blueprint $table) {
            $table->id();
            $table->text('bus_name');
            $table->text('bus_number');
            $table->text('License_Number')->nullable();
            $table->String('type');
            $table->text("bus_company");
            $table->integer('total_seat');
            $table->integer('per_label_seat');
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
        Schema::dropIfExists('bus_infos');
    }
}
