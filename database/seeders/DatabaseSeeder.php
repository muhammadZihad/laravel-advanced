<?php

	namespace Database\Seeders;

	use App\Models\Book;
	use App\Models\Genre;
	use App\Models\User;
	use Illuminate\Database\Seeder;

	class DatabaseSeeder extends Seeder
	{
		/**
		 * Seed the application's database.
		 *
		 * @return void
		 */
		public function run()
		{
			User::factory(10)->create();
			Genre::factory(20)->create();
			Book::factory(15)->create();
			$genres = Genre::all();
			Book::all()->each(function ($book) use ($genres) {
				$book->genres()->attach(
					$genres->random(rand(1, 3))->pluck("id")->toArray()
				);
			});
		}
	}
