<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ["title", "author_id", "desc"];

    public function author(){
    	return $this->belongsTo(User::class, "author_id");
	}

	public function genres(){
    	return $this->belongsToMany(Genre::class);
	}
}
