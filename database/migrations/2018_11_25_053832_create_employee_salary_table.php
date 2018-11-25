<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeSalaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_salary', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->text('note')->nullable();
            $table->text('salary_advance')->nullable();
            $table->integer('month')->nullable();
            $table->integer('hours')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees_salary');
    }
}
