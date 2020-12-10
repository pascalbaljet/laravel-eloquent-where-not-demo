<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get all of the post's comments.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include posts that have 5 or more comments.
     */
    public function scopePopular($query)
    {
        return $query->has('comments', '>=', 5);
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull($query->qualifyColumn('published_at'));
    }
    /**
     * Scope a query to only include published posts.
     */
    public function scopePublishedCurrentYear($query)
    {
        return $query->whereYear($query->qualifyColumn('published_at'), date('Y'));
    }
    /**
     * Scope a query to only include published posts.
     */
    public function scopeOnFrontPage($query)
    {
        $query->where('votes', '>', 10)
            ->has('comments', '>=', 5)
            ->whereHas('user', fn ($user) => $user->isAdmin())
            ->whereYear('published_at', date('Y'));
    }
}
