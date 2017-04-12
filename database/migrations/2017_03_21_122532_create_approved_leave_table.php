<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approved_leave', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apply_id')->nullable();
            $table->string('approved_type',15)->nullable();
            $table->text('comments')->nullable();
            $table->string('login_id',11)->nullable();
            $table->dateTime('date')->nullable();
            $table->date('re_start_date')->nullable();
            $table->date('re_end_date')->nullable();
            $table->double('total_days')->nullable();
            $table->double('prorata_basis_present')->nullable();
            $table->double('prorata_basis_after_this')->nullable();
            $table->double('leave_availed')->nullable();
            $table->string('send_to',50)->nullable();
            $table->integer('after_this_leave')->nullable();

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
        Schema::drop('approved_leave');

    }
}
