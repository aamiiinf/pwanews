<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'name', 'dic', 'role_tags', 'status'];
    protected $attributes = [
        'role_tags' => 1,
        'status' => 0
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
