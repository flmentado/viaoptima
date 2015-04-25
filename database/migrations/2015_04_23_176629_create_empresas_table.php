<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("empresas",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->bigInteger('usuario_id')->unsigned();
            $table->string("logo",100)->default('default.png');
            $table->string("cif",9);
            $table->string("nombre",50);
            $table->string("responsable",50);
            $table->string("contacto",50);
            $table->bigInteger("pais_id")->unsigned();
            $table->bigInteger("provincia_id")->unsigned();
            $table->bigInteger("localidad_id")->unsigned();
            $table->string("direccion",100);
            $table->string("cp",5);
            $table->string("telefono",13);
            $table->string("movil",13);
            $table->string("fax",13);
            $table->string("email",50);
            $table->string("web",50);
            $table->date("anio_constitucion");
            $table->smallInteger("num_trabajadores");
            $table->bigInteger("sector_id")->unsigned();
            $table->bigInteger("servicio_id")->unsigned();
            $table->boolean("activo");
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

            //relaciones
            $table->foreign("usuario_id")->references("id")->on("users")->onUpdate("cascade");
            $table->foreign("pais_id")->references("id")->on("paises")->onUpdate("cascade");
            $table->foreign("provincia_id")->references("id")->on("provincias")->onUpdate("cascade");
            $table->foreign("localidad_id")->references("id")->on("localidades")->onUpdate("cascade");
            $table->foreign("sector_id")->references("id")->on("categorias")->onUpdate("cascade");
            $table->foreign("servicio_id")->references("id")->on("categorias")->onUpdate("cascade");

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("empresas");
	}

}
