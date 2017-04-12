<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpRosterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_roster', function (Blueprint $table) {
            $table->increments('emp_roster_id');
            $table->string('emp_id',60)->nullable();
            $table->date('emp_roster_date')->nullable();
            $table->string('emp_roster_duty',10)->nullable();
            $table->time('emp_roster_exit')->nullable();
            $table->text('status')->nullable();

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
        Schema::drop('emp_roster');
    }
}
