<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',45);
            $table->string('clasification',25)->nullable();
            $table->string('levels',255)->nullable();
            $table->text('description');
            $table->text('link')->nullable();
            $table->string('cover')->default('public/covers/cover-default.png');
            $table->double('price')->nullable();
            $table->double('stock')->nullable();
            $table->boolean('active')->default(1);
            $table->integer('companies_id')->unsigned()->nullable();
            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('set null');
            $table->integer('categories_id')->unsigned()->nullable();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('set null');
            $table->integer('game_types_id')->unsigned()->nullable();
            $table->foreign('game_types_id')->references('id')->on('game_types')->onDelete('set null');
            $table->integer('plataforms_id')->unsigned()->nullable();
            $table->foreign('plataforms_id')->references('id')->on('plataforms')->onDelete('set null');

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
        Schema::dropIfExists('games');
    }
}
