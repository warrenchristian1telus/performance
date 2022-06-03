<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldTypeInNotificationLogRecipients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('notification_log_recipients', function (Blueprint $table) {
            //
            $table->integer('recipient_type')->nullable()->after('recipient_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('notification_log_recipients', function (Blueprint $table) {
            //
            $table->dropColumn('recipient_type');
        });
    }
}
