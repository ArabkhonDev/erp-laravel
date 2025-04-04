<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'group_id',  'phone', 'birth_date', 'address'];
    public function groups()
    {
        return $this->belongsTo(Group::class);
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student');
    }
}
