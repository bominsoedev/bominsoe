<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\DocBlock\Tag;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'excerpt',
        'body',
        'user_id',
        'is_public',
        'visit_count',
    ];

    public function User(): HasOne
    {
        return $this->hasOne(User::class);
    }
    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Tag(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function Photos(): HasMany
    {
        return $this->hasMany(Attachment::class);
    }

}
