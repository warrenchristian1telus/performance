<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSharedProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shared_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shared_id')->constrained('users');
            $table->foreignId('shared_with')->constrained('users');
            $table->json('shared_item');
            $table->string('comment');
            $table->foreignId('shared_by')->constrained('users');
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
        Schema::dropIfExists('shared_profiles');
    }
}
