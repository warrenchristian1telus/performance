<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesOnOrganizationTree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('organization_trees', function (Blueprint $table) {
            

            $table->index(['level1_program','level2_division', 'level3_branch', 'level4'], 'org_structure');
            $table->index(['organization']);
            $table->index(['parent_id']);
            $table->index(['name']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('organization_trees', function (Blueprint $table) {
            $table->dropIndex('org_structure');
            $table->dropIndex(['parent_id']);
            $table->dropIndex(['name']);
            $table->dropIndex(['organization']);
            

        });
    }
}
