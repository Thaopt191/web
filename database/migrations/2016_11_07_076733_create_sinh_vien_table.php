<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinhVienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("sinh_vien", function($table) {
            $table->integer("id")->unsigned();
            $table->integer("id_khoa")->unsigned();
            $table->string("khoa_hoc");
            $table->string("ctdt");
            $table->integer("id_de_tai")->unsigned();
            $table->primary("id");
            $table->integer("tt_dang_ky")->default(0);
            $table->integer("nop_ho_so")->default(0);
            
            $table->foreign("id")->references("id")->on("tai_khoan");
            $table->foreign("id_khoa")->references("id")->on("khoa");
            $table->foreign("id_de_tai")->references("id")->on("de_tai");
            $table->foreign("ctdt")->references("chuong_trinh")->on("ctdt");
            $table->foreign("khoa_hoc")->references("khoa_hoc")->on("khoa_hoc");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sinh_vien');
    }
}
