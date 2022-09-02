<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStuffInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuff_infos', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("address")->nullable();
            $table->text("mobile");
            $table->text("email")->nullable();
            $table->date("joining_date")->nullable();
            $table->tinyInteger("status")->default(1);
            $table->text("image");
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
        Schema::dropIfExists('stuff_infos');
    }
}
