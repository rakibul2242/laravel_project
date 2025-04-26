<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function results()
    {
        return $this->hasMany(Result::class);
    }

// Student.php
public function images()
{
    return $this->hasMany(Image::class);
}

}
