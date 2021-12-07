<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupervisorSignoffInConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversations', function (Blueprint $table) {
            $table->bigInteger('supervisor_signoff_id')->nullable()->after('sign_off_time');
            $table->dateTime('supervisor_signoff_time')->nullable()->after('supervisor_signoff_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversations', function (Blueprint $table) {
            $table->dropColumn('supervisor_signoff_id');
            $table->dropColumn('supervisor_signoff_time');
        });
    }
}
