<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Tema;
use App\Llista;

class CreaLlistaITemaTaules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('llistes', function(Blueprint $table) {
            $table->increments("id");
            $table->string("titol");
            $table->string("lloc");
            $table->string("organitzador");
            $table->string("email");
            $table->text("comentaris");
            $table->timestamps();
        });

        Schema::create('temes', function(Blueprint $table) {
            $table->increments("id");
            $table->integer("llista_id")->unsigned();
            $table->string("cantants");
            $table->string("tema");
            $table->string("video");
            $table->boolean("fet");
            $table->text("comentaris");
            $table->timestamps();
        });

        Schema::table('temes',function(Blueprint $table) {
            $table->foreign("llista_id")->references('id')->on('llistes')
                    ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('vots', function(Blueprint $table) {
            $table->increments("id");
            $table->integer("tema_id")->unsigned();
            $table->ipAddress("ip");
            $table->text("comentaris");
            $table->timestamps();
        });

        Schema::table('vots', function(Blueprint $table) {
                $table->foreign("tema_id")->references('id')->on('temes')
                    ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::drop("vots");
        Schema::drop("temes");
        Schema::drop("llistes");
    }
}
