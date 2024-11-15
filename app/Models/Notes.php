<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    use HasFactory;
    protected $table = 'notes'; // Specify the correct table name
    protected $fillable = ['note', 'user_id']; // Define fillable fields
}

# php artisan make:model Notes -m