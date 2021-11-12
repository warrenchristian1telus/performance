<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreparingColumnInConversationTopics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversation_topics', function (Blueprint $table) {
            $table->text('preparing_for_conversation')->nullable()->after("when_to_use");
            $table->text('question_html')->nullable()->after("when_to_use");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversation_topics', function (Blueprint $table) {
            $table->dropColumn('preparing_for_conversation');
            $table->dropColumn('question_html');
        });
    }
}
