<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
