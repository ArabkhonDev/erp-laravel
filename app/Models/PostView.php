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

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function viewer()
    {
        return $this->morphTo(__FUNCTION__, 'viewer_type', 'viewer_id');
    }
}
