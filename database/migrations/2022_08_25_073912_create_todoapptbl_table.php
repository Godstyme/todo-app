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
        Schema::create('todoapptbl', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')
            ->nullable();
            $table->foreign('users_id')
            ->references('id')
            ->on('users')
            ->onDelete('set null');
            $table->string('taskname');
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
        Schema::dropIfExists('todoapptbl');
    }
};
