<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'application_link', 
        'image_url', 
        'expired_date',
    ];
}
