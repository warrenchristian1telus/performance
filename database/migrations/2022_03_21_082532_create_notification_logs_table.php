<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_logs', function (Blueprint $table) {
            $table->id();
            $table->text('recipients');
            $table->string('subject');
            $table->text('description');
            $table->string('alert_type');
            $table->string('alert_format');
            $table->bigInteger('sender_id')->nullable();
            $table->bigInteger('template_id')->nullable();
            $table->integer('status')->nullable();
            $table->date('date_sent');
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
        Schema::dropIfExists('notification_logs');
    }
}
