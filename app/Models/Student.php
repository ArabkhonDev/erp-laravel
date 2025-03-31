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

    public function grades()
    {
        return $this->belongsToMany(Grade::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function postViews()
    {
        return $this->morphMany(PostView::class, 'viewer');
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
