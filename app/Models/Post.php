<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable; 


class Post extends Model
{
    use HasFactory;
    use sluggable;

    protected $fillable = ['title', 'slug', 'description', 'image_path', 
    'user_id'];

    public function user()
    {
        return $this->belongsTO(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
    
}
