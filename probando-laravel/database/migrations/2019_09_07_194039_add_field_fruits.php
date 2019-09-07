<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldFruits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::table('fruits', function(Blueprint $table){
            $table->string('country')->after('season');
            $table->renameColumn('name','nameFruit');
        });
        */

        // SQL without builder
        DB::statement('
        CREATE TABLE testingsql(
            id int(255) auto_increment not null,
            publication int(255),
            PRIMARY KEY(id)
            )
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
