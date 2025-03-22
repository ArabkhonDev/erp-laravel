<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'teacher_id',];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function lessons(){
        return $this->belongsToMany(Lesson::class,);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    
    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
}
