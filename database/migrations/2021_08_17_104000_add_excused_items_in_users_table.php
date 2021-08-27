<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExcusedItemsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->date('excused_start_date')->nullable();
          $table->date('excused_end_date')->nullable();
          $table->foreignId('excused_reason_id')->nullable()->constrained('excused_reasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('excused_start_date');
          $table->dropColumn('excused_end_date');
          $table->dropforeign('users_excused_reason_id_foreign');
          $table->dropColumn('excused_reason_id');
        });
    }
}
