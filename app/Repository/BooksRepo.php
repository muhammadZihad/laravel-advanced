<?php


	namespace App\Repository;


	use App\Models\Book;
	use Illuminate\Support\Facades\DB;

	class BooksRepo
	{
		public function allBooks()
		{
			return Book::with("author", "genres")->get()
				->map(function ($book) {
					return $this->formatResult($book);
				});
		}

		public function allBooksUsingQB(){
			$books = DB::table("books")
				->join("users", "author_id", "users.id")
				->get()
				->map(function ($book) {
					return $this->formatResultQB($book);
				});
			return $books;
		}

		private function formatResult($book){
			return [
				"title" => $book->title,
				"description" => $book->desc,
				"author" => $book->author->name,
				"email" => $book->author->email,
				"genres" => $book->genres->map(function ($genre){
					return [
						"id" => $genre->id,
						"title" => $genre->title
					];
				})
			];
		}private function formatResultQB($book){
			return [
				"title" => $book->title,
				"description" => $book->desc,
				"author" => $book->name,
				"email" => $book->email
			];
		}
	}