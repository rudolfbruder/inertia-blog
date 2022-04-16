<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model
{
    use HasFactory;
    use HasSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

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