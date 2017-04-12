<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('employee_data', function (Blueprint $table) {
            $table->increments('default_id');
            $table->string('card_number', 50)->nullable();
            $table->string('card_name',200)->nullable();
            $table->integer('company')->nullable();
            $table->integer('card_dept')->nullable();
            $table->integer('desig')->nullable();
            $table->string('duty_station',50)->nullable();
            $table->string('id_card',50)->nullable();
            $table->integer('user_access')->nullable();
            $table->string('line_manager',11)->nullable();
            $table->string('email',50)->nullable();
            $table->string('join_date',50)->nullable();
            $table->string('password',10)->nullable();
            $table->string('status')->default('1');
            $table->integer('employee_type')->default('1');
            $table->time('duty_time')->default('09:15:00');
            $table->time('exit_time')->default('18:30:00');
            $table->integer('block')->default('0');
            $table->integer('send_to_hr')->default('0');

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
        Schema::drop('employee_data');
    }
}
