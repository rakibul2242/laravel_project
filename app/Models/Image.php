<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
// Image.php
public function student()
{
    return $this->belongsTo(Student::class);
}

}
