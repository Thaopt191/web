<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("khoa", function ($table) {   
            $table->engine = "InnoDB";
            $table->increments("id");
            $table->string("name")->unique();
            $table->integer("so_luong_sv");
            $table->integer("mo_dang_ky")->default(0);
            $table->integer("admin_id")->unsigned();
            $table->foreign("admin_id")->references("id")->on("tai_khoan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('khoa');
    }
}
