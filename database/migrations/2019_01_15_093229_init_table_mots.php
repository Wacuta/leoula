<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitTableMots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->bigInteger('voteLe');
            $table->bigInteger('voteLa');
            $table->timestamps();
        });

        $myfile = fopen(base_path('liste_francais.txt'), "r") or die("Unable to open file!");
        // Output one line until end-of-file
        while(!feof($myfile)) {
            echo fgets($myfile);
            DB::table('words')->insertGetId(
                ['libelle' => fgets($myfile), 'voteLe' => 0, 'voteLa' => 0]
            );
        }
        fclose($myfile);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('words');
    }
}
