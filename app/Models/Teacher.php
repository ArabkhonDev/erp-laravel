<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /** @use HasFactory<\Database\Factories\TeacherFactory> */
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'subject', 'birth_date', 'address'];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function schedules(){
        return $this->belongsToMany(Schedule::class);
    }
}
