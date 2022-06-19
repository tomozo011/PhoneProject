<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUniqueConstraintToPlansPlanId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropForeign('cards_plan_id_foreign');
            $table->dropUnique(['plan_id']);
        });

        Schema::table('nets', function (Blueprint $table) {
            $table->dropForeign('nets_plan_id_foreign');
            $table->dropUnique(['plan_id']);
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_plan_id_foreign');
            $table->dropUnique(['plan_id']);
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->dropUnique(['plan_id']);
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('plans', function (Blueprint $table) {
            $table->unique(['plan_id']);
        });

        Schema::table('cards', function (Blueprint $table) {
            $table->unique(['plan_id']);
            $table->foreign(['plan_id'])
                  ->references(['plan_id'])->on('plans');
        });

        Schema::table('students', function (Blueprint $table) {
            $table->unique(['plan_id']);
            $table->foreign(['plan_id'])
                  ->references(['plan_id'])->on('plans');
        });

        Schema::table('nets', function (Blueprint $table) {
            $table->unique(['plan_id']);
            $table->foreign(['plan_id'])
                  ->references(['plan_id'])->on('plans');
        });
    }
}
