<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class PkrsGallery extends Model
{
    protected $table = 'pkrs_galleries';

    protected $primaryKey = 'id';

    protected $fillable = [
        'pkrs_post_id',
        'image',
        'sort_order',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(
            PkrsPost::class,
            'pkrs_post_id',
            'id'
        );
    }

    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (
            str_starts_with($this->image, 'http://')
            || str_starts_with($this->image, 'https://')
            || str_starts_with($this->image, '/')
        ) {
            return $this->image;
        }

        return Storage::disk('public')->url($this->image);
    }
}
