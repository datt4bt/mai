<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Task extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('task', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100)->unique();
            $table->text('description');
            $table->bigInteger('id_user')->unsigned();
            $table->integer('id_category')->unsigned();
            $table->boolean('status')->default(0);
            $table->foreign('id_user')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('id_category')
            ->references('id')->on('category')
            ->onDelete('cascade');
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
