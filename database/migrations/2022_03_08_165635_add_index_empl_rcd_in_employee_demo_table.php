<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexEmplRcdInEmployeeDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_demo', function (Blueprint $table) {
            //
            $table->dropUnique(['guid']);
            $table->index(['supervisor_emplid']);
            $table->index(['guid']);
            $table->unique(['employee_id', 'empl_record']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employee_demo', function (Blueprint $table) {
            //
            $table->dropUnique(['employee_id', 'empl_record']);
            $table->dropIndex(['supervisor_emplid']);
            $table->dropIndex(['guid']);
            $table->Unique(['guid']);

        });
    }
}
