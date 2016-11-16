<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinhVucHasGiangVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("linh_vuc_has_giang_vien", function($table) {
            $table->integer("id_giang_vien")->unsigned();
            $table->integer("id_linh_vuc")->unsigned();
            $table->index(["id_linh_vuc","id_giang_vien"]);
            
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
        Schema::drop('linh_vuc_has_giang_vien');
    }
}
