<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmployeeDemoTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_demo', function (Blueprint $table) {
            $table->dropColumn('date_posted');
            $table->dropColumn('date_deleted');
            $table->dropColumn('date_updated');
            $table->dropColumn('date_created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->datetime('date_posted')->nullable();
        $table->datetime('date_deleted')->nullable();
        $table->datetime('date_updated')->nullable();
        $table->datetime('date_created')->nullable();
    }
}
