<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_demo', function (Blueprint $table) {
            $table->string('guid')->unique();
            $table->string('employee_id')->nullable();
            $table->unsignedBigInteger('empl_record')->nullable();
            $table->string('employee_first_name')->nullable();
            $table->string('employee_last_name')->nullable();
            $table->string('employee_status')->nullable();
            $table->string('employee_email')->nullable();
            $table->string('classification')->nullable();
            $table->string('deptid')->nullable();
            $table->string('jobcode')->nullable();
            $table->string('job_title')->nullable();
            $table->string('position_number')->nullable();
            $table->date('position_start_date')->nullable();
            $table->string('manager_id')->nullable();
            $table->string('manager_first_name')->nullable();
            $table->string('manager_last_name')->nullable();
            $table->datetime('date_posted')->nullable();
            $table->datetime('date_deleted')->nullable();
            $table->datetime('date_updated')->nullable();
            $table->datetime('date_created')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_demo');
    }
}
