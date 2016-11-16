<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiangVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("giang_vien", function($table) {
            $table->integer("id")->unsigned();
            $table->integer("id_bo_mon")->unsigned();
            $table->primary("id");
            
            $table->foreign("id")->references("id")->on("tai_khoan");
            $table->foreign("id_bo_mon")->references("id")->on("bo_mon");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('giang_vien');
    }
}
