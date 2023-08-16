<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class CustomerMongoDB extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'laracoll'; // equivalent to $table for MySQL 

    protected $primaryKey = 'guid';

    // defines the schema's top-level properties.
    // ❌ skip nested definitions?
    // each of these can be assgined as an object, array, array of objects etc
    protected $fillable = ['guid','first_name', 'family_name', 'email', 'address'];
    
}
