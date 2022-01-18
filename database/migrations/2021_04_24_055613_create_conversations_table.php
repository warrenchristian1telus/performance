<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_topic_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->text('info_comment1')->nullable();
            $table->text('info_comment2')->nullable();
            $table->text('info_comment3')->nullable();
            $table->text('info_comment4')->nullable();
            $table->text('info_comment5')->nullable();
            $table->boolean('empl_agree1')->nullable();
            $table->boolean('empl_agree2')->nullable();
            $table->boolean('empl_agree3')->nullable();
            $table->boolean('supv_agree1')->nullable();
            $table->boolean('supv_agree2')->nullable();
            $table->boolean('supv_agree3')->nullable();
            $table->unsignedBigInteger('signoff_user_id')->nullable();
            $table->dateTime('sign_off_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
