<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_list', function (Blueprint $table) {
            $table->increments('co_id');
            $table->string('com_name', 60)->nullable();
            $table->text('com_location')->nullable();
            $table->string('com_logo',60)->nullable();
            $table->string('com_soft',60)->nullable();

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
        Schema::drop('company_list');
    }
}
