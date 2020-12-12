<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaPoets extends Migration
{
    public function up()
    {
        schema::dropIfExists('poempublications');
            Schema::create('poempublications', function (Blueprint $table) {
            $table -> string('poemcode', 250);
            $table -> string('publicationCode', 250);
            });
        

        DB::statement("DROP TABLE IF EXISTS poets");
        DB::statement("CREATE TABLE poets (
            poetCode INT(11) NOT NULL,
            firstName VARCHAR(30) NULL DEFAULT NULL,
            surname VARCHAR(40) NULL DEFAULT NULL,
            address VARCHAR(100) NULL DEFAULT NULL,
            postcode VARCHAR(20) NULL DEFAULT NULL,
            telephoneNumber VARCHAR(30) NULL DEFAULT NULL,
            PRIMARY KEY (poetCode)
        )");
        DB::statement("DROP TABLE IF EXISTS poems");
        DB::statement("CREATE TABLE poems (
            poemCode INT(11) NOT NULL,
            title VARCHAR(50) NULL DEFAULT NULL,
            contents TEXT NULL,
            poetCode INT(11) NULL DEFAULT NULL,
            PRIMARY KEY (poemCode)
        )");
        DB::statement("DROP TABLE IF EXISTS publications");
        DB::statement("CREATE TABLE publications (
            publicationCode INT(11) NOT NULL,
            title VARCHAR(50) NULL DEFAULT NULL,
            price INT(9) NULL DEFAULT NULL,
            PRIMARY KEY (publicationCode)
        )");
        DB::statement("DROP TABLE IF EXISTS customers");
        DB::statement("CREATE TABLE customers (
            customerCode INT(11) NOT NULL,
            firstName VARCHAR(30) NULL DEFAULT NULL,
            lastName VARCHAR(30) NULL DEFAULT NULL,
            adress VARCHAR(30) NULL DEFAULT NULL,
            potCode INT(11) NULL DEFAULT NULL,
            telephone VARCHAR(30) NULL DEFAULT NULL,
            PRIMARY KEY (customerCode)
            
        )");
        DB::statement("DROP TABLE IF EXISTS sales");
        DB::statement("CREATE TABLE sales (
            saleCode INT(11) NOT NULL,
            fecha VARCHAR(50) NULL DEFAULT NULL,
            amount FLOAT(9) NULL DEFAULT NULL,
            customerCode VARCHAR(50) NULL DEFAULT NULL,
            PRIMARY KEY (saleCode)
        )");
        DB::statement("DROP TABLE IF EXISTS salespublication");
        DB::statement("CREATE TABLE salespublications (
            salesCode INT(11) NOT NULL,
            publicationCode INT(11) NOT NULL,
            PRIMARY KEY (salesCode, publicationCode)
            
        )");
    }

    public function down()
    {
        Schema::table('poempublications', function (Blueprint $table) {
            schema::dropIfExists('poempublications');
        });
        DB::statement("DROP TABLE IF EXISTIS poets");
        DB::statement("DROP TABLE IF EXISTIS poems");
        DB::statement("DROP TABLE IF EXISTIS publications");
        DB::statement("DROP TABLE IF EXISTIS customers");
        DB::statement("DROP TABLE IF EXISTIS sales");
        DB::statement("DROP TABLE IF EXISTIS salespublication");

    }
}