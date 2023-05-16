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

    protected $guarded = [];
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
    protected $with = ['category', 'author', 'comments', 'photo'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query
            ->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('body', 'like', '%' . request('search') . '%')
        )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) => $query->whereHas('category', fn($query) => $query->where('slug', $category)
        )
        );
        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author)
        )
        );

    }

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

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function Tag(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function photo(): HasOne
    {
        return $this->hasOne(Attachment::class);
    }
}
