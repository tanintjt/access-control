<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_number',50)->nullable();
            $table->string('annual',50)->nullable();
            $table->string('medical',50)->nullable();
            $table->string('casual',50)->nullable();
            $table->string('metarnity',50)->nullable();
            $table->string('start_date',50)->nullable();
            $table->string('end_date',50)->nullable();
            $table->timestamp('last_update')->default(\DB::raw('CURRENT_TIMESTAMP'))->nullable();

            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('employee_leave');
    }
}
