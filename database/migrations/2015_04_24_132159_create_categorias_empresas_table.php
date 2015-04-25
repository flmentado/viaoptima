<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriasEmpresasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("categorias_empresas",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->bigInteger("empresa_id")->unsigned();
            $table->bigInteger("categoria_id")->unsigned();
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

            //relaciones
            $table->foreign("categoria_id")->references("id")->on("categorias")->onUpdate("cascade");
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
        Schema::drop("categorias_empresas");
    }


}
