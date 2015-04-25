<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostulacionesTable extends Migration {


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulaciones', function(Blueprint $table)
        {
            $table->bigIncrements("id");
            $table->bigInteger("proyecto_id")->unsigned();
            $table->bigInteger("profesional_id")->unsigned();
            $table->bigInteger("iniciativa_id")->unsigned();
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

            //relaciones
            $table->foreign("proyecto_id")->references("id")->on("proyectos")->onUpdate("cascade");
            $table->foreign("profesional_id")->references("id")->on("profesionales")->onUpdate("cascade");
            $table->foreign("iniciativa_id")->references("id")->on("iniciativas")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('postulaciones');
    }

}
