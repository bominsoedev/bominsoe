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
    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'excerpt',
        'description',
        'body',
        'user_id',
        'form_frameworks',
        'gradient_left',
        'share_count',
        'article_create_date',
        'is_public',
        'visit_count',

    ];

    use HasFactory;
    protected $guarded = [];
    protected $with = ['author','reactions','category','comments','article_photo'];

    public static function whereSlug($slug)
    {

    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) => $query->where(
                fn($query) => $query
                    ->where('title', 'like', '%' . request('search') . '%')
                    ->orWhere('body', 'like', '%' . request('search') . '%')
            )
        );
        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => $query->whereHas(
                'category',
                fn($query) => $query->where('slug', $category)
            )
        );
        $query->when($filters['author'] ?? false, fn($query, $author) => $query->whereHas('author', fn($query) => $query->where('username', $author)
        )
        );
    }

    public function category(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_categories');
    }

    public function reactionBy(User $user)
    {
        return $this->reactions->contains('user_id', $user->id);
    }

    public function reactions():HasMany
    {
        return $this->hasMany(Reaction::class);
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function article_photo(): HasOne
    {
        return $this->hasOne(Attachment::class)->where('status','article_photo');
    }

    public function comments_count():HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function comment(): HasOne
    {
        return $this->hasOne(Comment::class);
    }
    public function Tag(): HasMany
    {
        return $this->hasMany(Tag::class);
    }

    public function profile_photo(): HasMany
    {
        return $this->hasMany(Attachment::class)->where('status','profile_photo');
    }
}
