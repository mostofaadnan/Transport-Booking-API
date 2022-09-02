<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->date("schedule_date");
            $table->unsignedBigInteger("start_time_id");
            $table->unsignedBigInteger("start_point_id");
            $table->unsignedBigInteger("end_point_id");
            $table->unsignedBigInteger("bus_id");
            $table->unsignedBigInteger("stuff_id");
            $table->unsignedBigInteger("ticket_type_id");
            $table->tinyInteger("arriable_status");
            $table->tinyInteger("status");
            $table->text("Note")->nullable();
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
        Schema::dropIfExists('schedules');
    }
}
