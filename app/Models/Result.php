<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'course_id',
        'result',
    ];

    /**
     * Get the student that this result belongs to.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the course that this result belongs to.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
