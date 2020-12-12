<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsuarios extends Migration
{
   
    public function up()
    {
        
            Schema::create('usuarios', function (Blueprint $table) {
            $table -> increments('IDusuario');
            $table -> string('usuario', 100);
            $table -> string('password', 250);
            $table -> string('key', 250);
            $table -> timestamps();
            });
        

        DB::statement("DROP TABLE IF EXISTS games");
        DB::statement("CREATE TABLE games (
            IDgame int(11)NOT NULL AUTO_INCREMENT,
            game VARCHAR (250) DEFAULT NULL,
            PRIMARY KEY (IDgame)
        )");
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            schema::dropIfExists('usuarios');
        });
        DB::statement("DROP TABLE IF EXISTIS games");
    }
}
