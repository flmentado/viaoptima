<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposProfesionalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("grupos_profesionales",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->bigInteger("grupo_id")->unsigned();
            $table->bigInteger("profesional_id")->unsigned();
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

            //relaciones
            $table->foreign("grupo_id")->references("id")->on("grupos")->onUpdate("cascade");
            $table->foreign("profesional_id")->references("id")->on("profesionales")->onUpdate("cascade");

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
	}

}
