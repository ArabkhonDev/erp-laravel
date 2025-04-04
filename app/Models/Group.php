<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /** @use HasFactory<\Database\Factories\GroupFactory> */
    use HasFactory;

    
    protected $fillable = ['name', 'course_id', 'teacher_id', 'start_time', 'end_time', 'start_month'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class)->limit(20);
    }

    public function lessons(){
        return $this->hasMany(Lesson::class,);
    }
}
