<?php

namespace App\Http\Controllers;

use App\Repository\BooksRepo;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(BooksRepo $books){
    	return $books->allBooks();
	}
}
