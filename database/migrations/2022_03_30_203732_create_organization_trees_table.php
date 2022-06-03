<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationTreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_trees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('status')->nullable();
            $table->integer('level')->nullable();
            $table->string('organization');
            $table->string('level1_program');
            $table->string('level2_division');
            $table->string('level3_branch');
            $table->string('level4');
            $table->integer('no_of_employee')->nullable();
            $table->nestedSet();
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
        Schema::dropIfExists('organization_trees');
    }
}
