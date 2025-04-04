<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'subject', 'birth_date', 'address', 'course_id'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function postViews()
    {
        return $this->morphMany(PostView::class, 'viewer');
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
