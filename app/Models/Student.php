<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    protected $fillable = [
        'name',
        'roll',
        'section',
        'phone_number',
        'address'
    ];
}
