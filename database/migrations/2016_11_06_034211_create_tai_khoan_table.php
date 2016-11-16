<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaiKhoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("tai_khoan", function ($table) {
            $table->engine = "InnoDB";
            $table->increments("id");
            $table->string("ten_rieng");
            $table->string("username");
            $table->string("password");
            $table->string("email")->unique();
            $table->string("loai_tai_khoan");
            $table->integer("activated")->default(0);
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
        Schema::drop('tai_khoan');
    }
}
