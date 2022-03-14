<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSupervisorEmplidInEmployeeDemo extends Migration
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
            $table->string('supervisor_emplid')->after('supervisor_position_title')->nullable();
            $table->string('job_indicator')->after('organization')->nullable();
            $table->string('supervisor_position_start_date')->after('supervisor_position_title')->nullable();
           
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
            $table->dropColumn('supervisor_emplid');
            $table->dropColumn('job_indicator');
            $table->dropColumn('supervisor_position_start_date');
        });
    }
}
