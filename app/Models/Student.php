<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Defining the relationship between Student and Result (one-to-many)
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    // Defining the relationship between Student and Image (one-to-many)
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // If you want to make sure you can mass assign these fields, don't forget the $fillable property:
    protected $fillable = [
        'name',
        'roll',
        'section',
        'phone_number',
        'address'
    ];
}
