<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //Relationships
    public function author()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    //Scopes
    public function scopeActive($q)
    {
        return $q->where('active', true);
    }

    public function scopePublished($q)
    {
        return $q->whereNotNull('published_at');
    }

    //Methods
    public function isPublished() : bool
    {
        return !!$this->publishedAt;
    }

    public function isActive() : bool
    {
        return !!$this->active;
    }
}