<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjustmentInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjustment_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_id', 100)->nullable();
            $table->integer('leave_type')->nullable();
            $table->double('total_days')->nullable();
            $table->text('reasons')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('approved_by',100)->nullable();
            $table->dateTime('approved_date')->nullable();
            $table->integer('status')->nullable();

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
        Schema::drop('adjustment_info');
    }
}
