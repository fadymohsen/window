<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as ContractsTranslatable;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model implements ContractsTranslatable
{
    use Translatable;

    public $translatedAttributes = ['title', 'meta_title', 'meta_description', 'meta_keywords'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $appends = ['display_image'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function booted()
    {
        static::created(function ($service) {
            if (empty($service->slug)) {
                $title = $service->translate('en')?->title ?? $service->translate('ar')?->title ?? 'service';
                $service->slug = static::generateUniqueSlug($title, $service->id);
                $service->saveQuietly();
            }
        });

        static::updated(function ($service) {
            if (empty($service->slug)) {
                $title = $service->translate('en')?->title ?? $service->translate('ar')?->title ?? 'service';
                $service->slug = static::generateUniqueSlug($title, $service->id);
                $service->saveQuietly();
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
            $slug = 'service-' . time();
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

    public function portofolios()
    {
        return $this->hasMany(Portofolio::class);
    }

    public function getDisplayImageAttribute()
    {
        return asset('storage/' . $this->image);
    }
}