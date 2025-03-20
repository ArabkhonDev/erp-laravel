<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;

    
    protected $fillable = ['name', 'course_id', 'teacher_id', 'start_time', 'end_time'];

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'group_student')->limit(20);
    }

    public function lessons(){
        return $this->belongsToMany(Lesson::class,);
    }
    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
}
