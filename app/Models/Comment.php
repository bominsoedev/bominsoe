<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'article_id',
        'user_id',
        'body'
    ];
    protected $with = ['author','photo'];
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function photo(): BelongsTo
    {
        return $this->belongsTo(Attachment::class, 'user_id');
    }
}
