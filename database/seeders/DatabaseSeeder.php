<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		User::create([
			'username' => 'admin',
			'email'    => 'admin@gmail.com',
			'password' => bcrypt('admin123'),
		]);

		$patch = public_path('img/image.png');
		$file = new File($patch);
		$storageImg = Storage::putFile('img', $file);

		$movie = Movie::create([
			'name' => [
				'en' => 'The Son of Soldier',
				'ge' => 'ჯარის კაცის მამა',
			],
			'img' => $storageImg,
		]);

		Quote::create([
			'movie_id' => $movie->id,
			'quote'    => [
				'en' => 'What should I tell you your mother?!',
				'ge' => 'რა უნდა ვუთხრა დედაშენს?!',
			],
			'quote_img' => $storageImg,
		]);

		$patch = public_path('img/naruto.jpg');
		$file = new File($patch);
		$storageImg = Storage::putFile('img', $file);

		$movie = Movie::create([
			'name' => [
				'en' => 'Naruto',
				'ge' => 'ნარუტო',
			],
			'img' => $storageImg,
		]);

		$patch = public_path('img/naruto1.jpg');
		$file = new File($patch);
		$storageImg = Storage::putFile('img', $file);

		Quote::create([
			'movie_id' => $movie->id,
			'quote'    => [
				'en' => 'If you don’t like your destiny, don’t accept it. Instead have the courage to change it the way you want it to be',
				'ge' => 'თუ არ მოგწობს შენი ბედი, ნუ მიიღებ მას. ამის სანაცვლოდ გეყოთ გამბედაობა, შეცვალოთ ის ისე, როგორც თქვენ გინდათ.',
			],
			'quote_img' => $storageImg,
		]);

		$patch = public_path('img/nagato.jpg');
		$file = new File($patch);
		$storageImg = Storage::putFile('img', $file);

		Quote::create([
			'movie_id' => $movie->id,
			'quote'    => [
				'en' => 'If you don’t share someone’s pain, you can never understand them.',
				'ge' => 'თუ არ იზიარებ ვინმეს ტკივილს, ვერასოდეს გაუგებ მას.',
			],
			'quote_img' => $storageImg,
		]);

		$patch = public_path('img/fairy-tail.jpg');
		$file = new File($patch);
		$storageImg = Storage::putFile('img', $file);

		$movie = Movie::create([
			'name' => [
				'en' => 'Fairy Tail',
				'ge' => 'ფერიის კუდი',
			],
			'img' => $storageImg,
		]);
	}
}
