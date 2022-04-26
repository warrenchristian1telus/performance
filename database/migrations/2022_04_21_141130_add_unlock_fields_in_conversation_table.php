<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnlockFieldsInConversationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversations', function (Blueprint $table) {
            //
            $table->date('unlock_until')->nullable()->after('initial_signoff');
            $table->bigInteger('unlock_by')->nullable()->after('unlock_until');
            $table->datetime('unlock_at')->nullable()->after('unlock_by');
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
            //
            $table->dropColumn('unlock_at');
            $table->dropColumn('unlock_by');
            $table->dropColumn('unlock_until');
        });
    }
}
