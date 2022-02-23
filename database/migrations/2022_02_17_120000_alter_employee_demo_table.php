<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEmployeeDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employee_demo', function (Blueprint $table) {
            $table->string('business_unit')->after('manager_last_name')->nullable();
            $table->string('classification_group')->after('manager_last_name')->nullable();
            $table->date('effdt')->after('manager_last_name')->nullable();
            $table->smallInteger('effseq')->default(0)->after('manager_last_name');
            $table->string('empl_class')->after('manager_last_name')->nullable();
            $table->string('empl_ctg')->after('manager_last_name')->nullable();
            $table->date('hire_dt')->after('manager_last_name')->nullable();
            $table->string('idir')->after('manager_last_name')->nullable();
            $table->string('job_function')->after('manager_last_name')->nullable();
            $table->string('jobcodedescgroup')->after('manager_last_name')->nullable();
            $table->string('occupationalgroup')->after('manager_last_name')->nullable();
            $table->string('paygroup')->after('manager_last_name')->nullable();
            $table->string('organization')->after('manager_last_name')->nullable();
            $table->string('address1')->after('manager_last_name')->nullable();
            $table->string('address2')->after('manager_last_name')->nullable();
            $table->string('appointment_status')->after('manager_last_name')->nullable();
            $table->string('can_noc_code')->after('manager_last_name')->nullable();
            $table->string('city')->after('manager_last_name')->nullable();
            $table->string('country')->after('manager_last_name')->nullable();
            $table->string('employee_status_long')->after('manager_last_name')->nullable();
            $table->smallInteger('estimated_years_service')->default(0)->after('manager_last_name');
            $table->string('job_function_employee_group')->after('manager_last_name')->nullable();
            $table->string('jobcode_desc')->after('manager_last_name')->nullable();
            $table->string('level1_program')->after('manager_last_name')->nullable();
            $table->string('level2_division')->after('manager_last_name')->nullable();
            $table->string('level3_branch')->after('manager_last_name')->nullable();
            $table->string('level4')->after('manager_last_name')->nullable();
            $table->string('employee_middle_name')->after('manager_last_name')->nullable();
            $table->string('employee_name')->after('manager_last_name')->nullable();
            $table->string('office_address')->after('manager_last_name')->nullable();
            $table->string('office_address2')->after('manager_last_name')->nullable();
            $table->string('office_city')->after('manager_last_name')->nullable();
            $table->string('office_country')->after('manager_last_name')->nullable();
            $table->string('office_location_code')->after('manager_last_name')->nullable();
            $table->string('office_phone')->after('manager_last_name')->nullable();
            $table->string('office_postal')->after('manager_last_name')->nullable();
            $table->string('office_stateprovince')->after('manager_last_name')->nullable();
            $table->string('phone')->after('manager_last_name')->nullable();
            $table->string('position_title')->after('position_number')->nullable();
            $table->string('postal')->after('manager_last_name')->nullable();
            $table->string('public_service_act')->after('manager_last_name')->nullable();
            $table->string('sal_admin_plan')->after('manager_last_name')->nullable();
            $table->string('stateprovince')->after('manager_last_name')->nullable();
            $table->string('supervisor_email')->after('manager_last_name')->nullable();
            $table->string('supervisor_name')->after('manager_last_name')->nullable();
            $table->string('supervisor_position_number')->after('manager_last_name')->nullable();
            $table->string('supervisor_position_title')->after('manager_last_name')->nullable();
            $table->string('tgb_reg_district')->after('manager_last_name')->nullable();
            // $table->string('organization')->after('manager_last_name')->nullable();
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
            $table->dropColumn('business_unit');
            $table->dropColumn('classification_group');
            $table->dropColumn('effdt');
            $table->dropColumn('effseq');
            $table->dropColumn('empl_class');
            $table->dropColumn('empl_ctg');
            $table->dropColumn('hire_dt');
            $table->dropColumn('idir');
            $table->dropColumn('job_function');
            $table->dropColumn('jobcodedescgroup');
            $table->dropColumn('occupationalgroup');
            $table->dropColumn('paygroup');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('appointment_status');
            $table->dropColumn('can_noc_code');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('employee_status_long');
            $table->dropColumn('estimated_years_service');
            $table->dropColumn('job_function_employee_group');
            $table->dropColumn('jobcode_desc');
            $table->dropColumn('level1_program');
            $table->dropColumn('level2_division');
            $table->dropColumn('level3_branch');
            $table->dropColumn('level4');
            $table->dropColumn('employee_middle_name');
            $table->dropColumn('employee_name');
            $table->dropColumn('office_address');
            $table->dropColumn('office_address2');
            $table->dropColumn('office_city');
            $table->dropColumn('office_country');
            $table->dropColumn('office_location_code');
            $table->dropColumn('office_phone');
            $table->dropColumn('office_postal');
            $table->dropColumn('office_stateprovince');
            $table->dropColumn('phone');
            $table->dropColumn('position_title');
            $table->dropColumn('postal');
            $table->dropColumn('public_service_act');
            $table->dropColumn('sal_admin_plan');
            $table->dropColumn('stateprovince');
            $table->dropColumn('supervisor_email');
            $table->dropColumn('supervisor_name');
            $table->dropColumn('supervisor_position_number');
            $table->dropColumn('supervisor_position_title');
            $table->dropColumn('tgb_reg_district');
        });
    }
}
