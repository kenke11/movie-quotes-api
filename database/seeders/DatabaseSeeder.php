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
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123')
        ]);

        $patch = public_path('img/image.png');
        $file = new File($patch);
        $storageImg = Storage::putFile('img', $file);

        $movie = Movie::create([
            'name' => [
                'en' => 'The Son of Soldier',
                'ge' => 'ჯარის კაცის მამა'
            ],
            'img' => $storageImg
        ]);

        Quote::create([
            'movie_id' => $movie->id,
            'quote' => [
                'en' => 'What should I tell you your mother?!',
                'ge' => 'რა უნდა ვუთხრა დედაშენს?!'
            ],
            'quote_img' => $storageImg
        ]);

    }
}
