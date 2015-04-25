<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("proyectos",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->bigInteger("empresa_id")->unsigned();
            $table->text("titulo");
            $table->text("objetivo");
            $table->datetime("fecha_inicio");
            $table->datetime("fecha_final");
            $table->boolean("estado")->default(false);
            $table->boolean("activo")->default(false);
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

            //relación
            $table->foreign("empresa_id")->references("id")->on("empresas")->onUpdate("cascade");

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("proyectos");

	}

}
