<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = ['title', 'group_id', 'description', 'course_id', 'video_path', 'document_path', 'room_id',  'date', 'time'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
}
