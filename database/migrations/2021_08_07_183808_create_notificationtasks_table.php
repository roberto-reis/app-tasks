<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationtasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificationtasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('task_id');
            $table->boolean('visualized');
            $table->boolean('sent_email');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificationtasks');
    }
}
