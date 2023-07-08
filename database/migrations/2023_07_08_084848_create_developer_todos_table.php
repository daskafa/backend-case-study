<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_todos', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('task_name');
            $table->unsignedTinyInteger('difficulty');
            $table->unsignedTinyInteger('duration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developer_todos');
    }
};
