<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'publication_year'];

    public function authors(){

      return $this->hasManyThrough(
        '\App\Models\Authors',
        '\App\Models\BookAuthor',
        'book_id',
        'id',
        'id',
        'author_id'

      );

    }
}
