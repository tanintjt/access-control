<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_reamrks', function (Blueprint $table) {
            $table->increments('emp_roster_id');
            $table->string('emp_id',60)->nullable();
            $table->date('emp_roster_date')->nullable();
            $table->string('emp_roster_remarks',300)->nullable();
            $table->string('coments_boss',300)->nullable();
            $table->string('remarks_type',15)->nullable();
            $table->string('status',1)->default('0');
            $table->dateTime('request_time')->nullable();
            $table->dateTime('approved_time')->nullable();
            $table->string('approved_by',60)->nullable();

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
        Schema::drop('emp_reamrks');
    }
}
