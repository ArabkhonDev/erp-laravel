<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone', 'birth_date', 'address'];
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_student');
    }

    public function grades(){
        return $this->belongsToMany(Grade::class);
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
