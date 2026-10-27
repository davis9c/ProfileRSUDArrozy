<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PkrsCategory extends Model
{
    use HasFactory;

    protected $table = 'pkrs_categories';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(
            PkrsPost::class,
            'pkrs_category_id',
            'id'
        );
    }
}
