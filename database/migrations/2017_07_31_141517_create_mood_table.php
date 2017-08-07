<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mood', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("company_id");
            $table->integer("employee_id");
            $table->string("mood");
            $table->string("status");
            $table->string("description")->nullable();
            $table->timestamps();

            $table->foreign("employee_id")->references("id")->on("employee");
            $table->foreign("company_id")->references("id")->on("company");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mood');
    }
}
