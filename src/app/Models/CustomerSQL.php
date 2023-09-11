<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

// This is the standard Eloquent Model
use Illuminate\Database\Eloquent\Model;

class CustomerSQL extends Model
{
    use HasFactory;

    // the selected database as defined in /config/database.php
    protected $connection   = 'mysql';
    // the table as defined in the migration
    protected $table        = 'customer_sql';
    // our selected primary key for this model
    protected $primaryKey   = 'guid'; 
    // the attributes' names that match the migration's schema
    protected $fillable = ['guid','first_name', 'family_name', 'email', 'address'];
}
