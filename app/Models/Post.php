<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'featured_image',
        'type', 'video_url', 'video_type', 'meta_title', 'meta_description',
        'tags', 'is_featured', 'is_published', 'published_at',
        'author_id', 'category_id', 'country_id'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
            if ($post->is_published && !$post->published_at) {
                $post->published_at = now();
            }
        });

        static::updating(function ($post) {
            if ($post->is_published && !$post->published_at) {
                $post->published_at = now();
            }
        });
    }

    // Relations
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }

    // Scopes
    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where('published_at', '<=', now());
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeArticles($query)
    {
        return $query->where('type', 'article');
    }

    public function scopeVideos($query)
    {
        return $query->where('type', 'video');
    }

    // Accessors
    public function getFeaturedImageUrlAttribute()
    {
        return asset('storage/' . $this->featured_image);
    }

    public function getExcerptLimitedAttribute()
    {
        return Str::limit($this->excerpt, 150);
    }

    public function getReadTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        return ceil($words / 200); // Average reading speed
    }

    public function getFormattedPublishedDateAttribute()
    {
        return $this->published_at ? $this->published_at->format('d M Y') : '';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Methods
    public function incrementViews()
    {
        $this->increment('views_count');
    }

    public function getSimilarPosts($limit = 4)
    {
        return static::published()
            ->where('id', '!=', $this->id)
            ->where('category_id', $this->category_id)
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }

    public function getMetaTitleAttribute($value)
    {
        return $value ?: $this->title;
    }

    public function getMetaDescriptionAttribute($value)
    {
        return $value ?: $this->excerpt_limited;
    }
}