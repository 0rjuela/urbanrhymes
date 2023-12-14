<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserUpdateColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function($table) {
        $table->boolean('completed')->default(0);
        $table->smallInteger('scene_1')->default(0);
        $table->smallInteger('scene_2')->default(0);
        $table->smallInteger('scene_3')->default(0);
        $table->smallInteger('scene_4')->default(0);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function($table) {
        $table->dropColumn('completed');
        $table->dropColumn('scene_1');
        $table->dropColumn('scene_2');
        $table->dropColumn('scene_3');
        $table->dropColumn('scene_4');
      });
    }
}
