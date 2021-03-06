<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use JeroenG\Explorer\Application\Explored;

class Post extends Model implements Explored
{
    use HasFactory;
    use HasSlug;
    use SoftDeletes;
    use Searchable;

    public const PAGINATE_FE = 6;
    public const PAGINATE_BE = 24;

    //Packages setup
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

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function mappableAs(): array
    {
        return [
            'id' => 'keyword',
            'title' => 'text',
            'summary' => 'text',
            'category' => [
                'type' => 'nested'
            ],
        ];
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->summary,
            'category' => [
                'name' => $this->category->title,
            ],
        ];
    }

    //Relationships
    public function author()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
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