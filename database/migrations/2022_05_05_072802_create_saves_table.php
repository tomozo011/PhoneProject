<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saves', function (Blueprint $table) {
            $table->id();
            $table->string('carrier');
            $table->string('Plans_name');
            $table->integer('Plans_price');
            $table->string('Tells_name');
            $table->integer('Tells_price');
            $table->integer('Nets_price');
            $table->integer('Member_price');
            $table->integer('Cards_price');
            $table->integer('Students_price');
            $table->integer('Totals');

            $table->string('name');
            $table->unsignedBigInteger('user_id')->unique;
            
            $table->timestamps();

            $table->foreign(['user_id'])
                  ->references(['id'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saves');
        // Schema::table('students', function (Blueprint $table) {
        //     $table->dropForeign('saves_user_id_foreign');
        //     $table->dropUnique(['user_id']);
        // });
    }
}
