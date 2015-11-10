<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ipmi_area')->default('无'); // ipmi 地址范围
            $table->string('ipmi_addr')->default('无'); // ipmi 地址分配
            $table->string('manage_area')->default('无'); // 管理 地址范围
            $table->string('manage_addr')->default('无'); // 管理 地址分配
            $table->string('park_area')->default('无'); // 园区网 地址范围
            $table->string('park_addr')->default('无'); // 园区网 地址分配

            $table->string('use')->default('无');  // 用途
            $table->string('model')->default('无'); // 型号

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
        Schema::drop('data');
    }
}
