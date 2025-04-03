<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    protected $fillable = [
        'desc', 'task', 'lesson_id',
    ] ;

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
