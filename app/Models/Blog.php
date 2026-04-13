<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model implements TranslatableContract
{
    use Translatable;

    public $translatedAttributes = ['title', 'description', 'keywords', 'meta_title', 'meta_description'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['display_image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::created(function ($blog) {
            if (empty($blog->slug)) {
                $title = $blog->translate('en')?->title ?? $blog->translate('ar')?->title ?? 'blog';
                $blog->slug = static::generateUniqueSlug($title, $blog->id);
                $blog->saveQuietly();
            }
        });

        static::updated(function ($blog) {
            if (empty($blog->slug)) {
                $title = $blog->translate('en')?->title ?? $blog->translate('ar')?->title ?? 'blog';
                $blog->slug = static::generateUniqueSlug($title, $blog->id);
                $blog->saveQuietly();
            }
        });
    }

    public static function generateUniqueSlug(string $title, ?int $excludeId = null): string
    {
        $slug = Str::slug($title);
        if (empty($slug)) {
            $slug = Str::slug(Str::transliterate($title));
        }
        if (empty($slug)) {
            $slug = 'blog-' . time();
        }

        $query = static::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }
        if ($query->exists()) {
            $slug = $slug . '-' . time();
        }

        return $slug;
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDisplayImageAttribute()
    {
        return asset('storage/' . $this->cover);
    }
}
