<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoMonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("bo_mon", function($table) {
            $table->increments("id");
            $table->string("ten")->unique();
            $table->string("mo_ta");
            $table->integer("id_khoa")->unsigned();
            $table->foreign("id_khoa")->references("id")->on("khoa"); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('bo_mon');
    }
}
