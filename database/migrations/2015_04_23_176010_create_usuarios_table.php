<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('usuario',50)->unique();
            $table->string('password',60);
            $table->string("foto",100)->default('default.png');
            $table->bigInteger('rol_id')->unsigned();
            $table->string('email',100)->unique();
            $table->boolean('resetear_password')->default(false);
            $table->boolean('confirmado')->default(false);
            $table->string('codigo_confirmar')->nullable();
            $table->boolean('activo')->default(false);
            $table->rememberToken();
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

            //relaciones
            $table->foreign("rol_id")->references("id")->on("roles")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
