<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'viewer_id',
        'viewer_type',
        'viewed_at',
        'view_count',
    ];

    public $timestamps = true;

    // Post bilan bog'lanish
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Viewer (ko‘ruvchi) bilan polymorphic bog‘lanish
    public function viewer()
    {
        return $this->morphTo(__FUNCTION__, 'viewer_type', 'viewer_id');
    }
}
