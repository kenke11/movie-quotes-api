<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
	public function up()
	{
		Schema::create('quotes', function (Blueprint $table) {
			$table->id();
			$table->foreignId('movie_id');
			$table->json('quote');
			$table->string('quote_img');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('quotes');
	}
}
