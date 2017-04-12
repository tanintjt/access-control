<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplyLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_leave', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id', 200)->nullable();
            $table->string('leave_type',1)->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->double('total_days')->nullable();
            $table->double('after_this_leave')->nullable();
            $table->double('prorata_basis_present')->nullable();
            $table->double('prorata_basis_after_this')->nullable();
            $table->double('leave_availed')->nullable();
            $table->text('reasons')->nullable();

            $table->string('duty_station',2)->nullable();
            $table->string('address_during',250)->nullable();
            $table->string('contact',20)->nullable();
            $table->string('replace_emplayee',11)->nullable();
            $table->string('line_manager',20)->nullable();
            $table->string('status',15)->nullable();


            $table->dateTime('approved_date')->nullable();
            $table->dateTime('apply_date')->nullable();
            $table->string('send_to',50)->nullable();
            $table->string('hr_status',2)->nullable();
            $table->string('add_leave',5)->nullable();

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
        Schema::drop('apply_leave');
    }
}
