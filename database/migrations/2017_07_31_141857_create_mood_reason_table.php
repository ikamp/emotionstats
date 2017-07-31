<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoodReasonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mood_reason', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("employee_id");
            $table->integer("mood_id");
            $table->string("reason");
            $table->timestamps();

            $table->foreign("mood_id")->references("id")->on("mood");
            $table->foreign("employee_id")->references("id")->on("employee");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
