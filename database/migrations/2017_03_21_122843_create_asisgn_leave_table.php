<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsisgnLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asisgn_leave', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('annual')->nullable();
            $table->integer('casual')->nullable();
            $table->integer('medical')->nullable();
            $table->integer('metarnity')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::drop('asisgn_leave');
    }
}
