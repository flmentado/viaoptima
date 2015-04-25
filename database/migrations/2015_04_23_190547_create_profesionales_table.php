<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("profesionales",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->bigInteger('usuario_id')->unsigned();
            $table->string("nif_cif",9);
            $table->string("nombre",50);
            $table->string("apellido_1",50);
            $table->string("apellido_2",50);
            $table->date("fecha_nacimiento");
            $table->bigInteger("pais_id")->unsigned();
            $table->bigInteger("provincia_id")->unsigned();
            $table->bigInteger("localidad_id")->unsigned();
            $table->string("direccion",100);
            $table->string("cp",5);
            $table->string("telefono",13);
            $table->string("movil",13);
            $table->string("fax",13);

            $table->string("web",50);
            $table->text("formacion_academica");
            $table->text("formacion_complementaria");
            $table->text("habilidades");
            $table->text("experiencia_profesional");

            $table->boolean("formador")->default(false);
            $table->boolean("tutor")->default(false);
            $table->boolean("compartir_experiencia")->default(false);
            $table->boolean("activo")->default(false);
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

            //relaciones
            $table->foreign("usuario_id")->references("id")->on("users")->onUpdate("cascade");
            $table->foreign("pais_id")->references("id")->on("paises")->onUpdate("cascade");
            $table->foreign("provincia_id")->references("id")->on("provincias")->onUpdate("cascade");
            $table->foreign("localidad_id")->references("id")->on("localidades")->onUpdate("cascade");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("profesionales");
	}

}
