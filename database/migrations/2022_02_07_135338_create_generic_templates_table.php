<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenericTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generic_templates', function (Blueprint $table) {
            $table->id();
            $table->string('template')->unique();
            $table->string('description');
            $table->text('instructional_text');
            $table->string('sender');
            $table->string('email')->nullable();
            $table->string('azure_id')->nullable();
            $table->string('subject');
            $table->text('body');
            $table->bigInteger('created_by_id')->nullable();
            $table->bigInteger('modified_by_id')->nullable();
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
        Schema::dropIfExists('generic_templates');
    }
}
