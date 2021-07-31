<?php

namespace App\Models\f_m;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'user_id', 'description', 'image', 'slug'];
    protected $attributes = [
        'hit' => 300
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);                 
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
