<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class PkrsPost extends Model
{
    protected $table = 'pkrs_posts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pkrs_category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'thumbnail',
        'type',
        'video',
        'video_cover',
        'featured',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            PkrsCategory::class,
            'pkrs_category_id',
            'id'
        );
    }

    public function galleries(): HasMany
    {
        return $this->hasMany(
            PkrsGallery::class,
            'pkrs_post_id',
            'id'
        );
    }

    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->fileUrl($this->thumbnail);
    }

    public function getVideoUrlAttribute(): ?string
    {
        return $this->fileUrl($this->video);
    }

    public function getVideoCoverUrlAttribute(): ?string
    {
        return $this->fileUrl($this->video_cover);
    }

    private function fileUrl(?string $path): ?string
    {
        if (! $path) {
            return null;
        }

        if (
            str_starts_with($path, 'http://')
            || str_starts_with($path, 'https://')
            || str_starts_with($path, '/')
        ) {
            return $path;
        }

        return Storage::disk('public')->url($path);
    }
}
