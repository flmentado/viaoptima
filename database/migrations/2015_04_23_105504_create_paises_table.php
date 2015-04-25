<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("paises",function(Blueprint $table){
            $table->bigIncrements("id");
            $table->string("pais",50);
            $table->timestamp('create_at')->default(date("Y-m-d H:i:s"));
            $table->timestamp('update_at')->default(date("Y-m-d H:i:s"));

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop("paises");
	}

}
