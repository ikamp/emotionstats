<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->increments("id");
            $table->string("name");
            $table->string("email")->unique();
            $table->string("password");
            $table->string("role");
            $table->string("status");
            $table->integer("department_id");
            $table->integer("company_id");
            $table->rememberToken();
            $table->timestamps();

            $table->foreign("department_id")->references("id")->on("department");
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
        Schema::dropIfExists('employee');
    }
}
