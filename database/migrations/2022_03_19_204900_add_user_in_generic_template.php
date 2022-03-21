<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserInGenericTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('generic_templates', function (Blueprint $table) {
            //
            $table->bigInteger('sender_id')->nullable()->after('sender');
            $table->dropColumn('email');
            $table->dropColumn('azure_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('generic_templates', function (Blueprint $table) {
            //
            $table->string('azure_id')->nullable()->after('sender');
            $table->string('email')->nullable()->after('sender');
            $table->dropColumn('sender_id');


        });
    }
}
