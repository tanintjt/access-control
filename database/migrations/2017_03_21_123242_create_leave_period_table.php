<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavePeriodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_period', function (Blueprint $table) {
            $table->increments('id');
            $table->date('leave_period_start')->nullable();
            $table->date('leave_period_end')->nullable();
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
        Schema::drop('leave_period');
    }
}
