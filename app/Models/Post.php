<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

// use this instead of the default "Illuminate\Database\Eloquent\Model"
use Jenssegers\Mongodb\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // required for MongoDB, defined in /config/database.php
    protected $connection = 'mongodb';

    // Normallt the table (collection in MDB lingo) would be the plural class name = "posts" 
    // override it as follow
    protected $collection = 'laracoll';

    // ❌
    // We might need the migration to create indexes and define primary keys??
    protected $primaryKey = 'guid';

    // ❌
    protected $indexes = [
        ['key' => ['guid' => 1], 'options' => ['unique' => true]],
    ];
}
