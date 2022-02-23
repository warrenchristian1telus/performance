<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('org_nodes', function (Blueprint $table) {
            $table->string('org_hierarchy_key')->unique();
            $table->string('business_name')->nullable();
            $table->string('deptid')->nullable();
            $table->string('hierarchy_level')->nullable();
            $table->string('parent_key')->nullable();
            $table->datetime('date_updated')->nullable();
            $table->datetime('date_deleted')->nullable();
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
        Schema::dropIfExists('org_nodes');
    }
}
