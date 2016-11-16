<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeTaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("de_tai", function($table) {
            $table->increments("id");
            $table->string("ten")->unique(); 
            $table->integer("id_linh_vuc")->unsigned();
            $table->integer("id_giang_vien")->unsigned();
            $table->foreign("id_linh_vuc")->references("id")->on("linh_vuc");
            $table->foreign("id_giang_vien")->references("id")->on("giang_vien");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('de_tai');
    }
}
