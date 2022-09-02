<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("passanger_id");
            $table->unsignedBigInteger("shedule_id");
            $table->text("seat_number");
            $table->tinyInteger("status");
            $table->integer("total_seat");
            $table->float("seat_price");
            $table->float("amount");
            $table->float("paid");
            $table->float("due");
            $table->unsignedBigInteger("payment_id");
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
        Schema::dropIfExists('bookings');
    }
}
