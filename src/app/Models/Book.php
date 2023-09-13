<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Illuminate\Database\Eloquent\Model;

// use this instead of the default "Illuminate\Database\Eloquent\Model"
use MongoDB\Laravel\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'isbn'];

    protected $connection = 'mongodb';
    protected $primaryKey = 'isbn';

    protected $collection = 'books';
}
