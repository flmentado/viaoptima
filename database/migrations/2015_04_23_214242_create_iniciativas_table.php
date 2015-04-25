<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIniciativasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("iniciativas",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->string("iniciativa",50);
            $table->text("necesidad_a_resolver");
            $table->text("solucion");
            $table->text("ambito_geografico");
            $table->bigInteger("categoria_id")->unsigned();
            $table->bigInteger("profesional_id")->unsigned();
            $table->boolean("activo")->default(false);
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

            //relaciones
            $table->foreign("categoria_id")->references("id")->on("categorias")->onUpdate("cascade");
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
		Schema::drop("iniciativas");
	}

}
