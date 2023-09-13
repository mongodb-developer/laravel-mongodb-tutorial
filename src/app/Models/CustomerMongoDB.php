<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Illuminate\Database\Eloquent\Model;
use MongoDB\Laravel\Eloquent\Model;

class CustomerMongoDB extends Model
{
    use HasFactory;

    // the selected database as defined in /config/database.php
    protected $connection = 'mongodb';

    // equivalent to $table for MySQL
    protected $collection = 'laracoll';

    // defines the schema's top-level properties.
    protected $fillable = ['guid','first_name', 'family_name', 'email', 'address'];
}
