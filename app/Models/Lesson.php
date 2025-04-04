<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    /** @use HasFactory<\Database\Factories\LessonFactory> */
    use HasFactory;

    protected $fillable = ['title', 'group_id', 'description', 'video_path', 'document_path',];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }
    
    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
