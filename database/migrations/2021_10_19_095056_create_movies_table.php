<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
	public function up()
	{
		Schema::create('movies', function (Blueprint $table) {
			$table->id();
			$table->json('name');
			$table->string('img');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('movies');
	}
}
