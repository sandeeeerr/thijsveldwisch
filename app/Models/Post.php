<?php

namespace App\Models;

use App\Filament\Resources\PostResource;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'slug',
        'content',
        'image_id',
        'user_id',
        'is_published',
        'published_at',
        'attachments',
        'full_width',
        'has_audio',
        'post_type',
        'services',
        'sort_order',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'attachments' => 'array',
        'has_audio' => 'boolean',
    ];

    /**
     * Get the user that owns the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the featured media (image or video) for the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function media()
    {
        return $this->belongsTo(Media::class, 'image_id'); // image_id kan nu ook een video zijn
    }

    /**
     * Check if the featured media is a video.
     *
     * @return bool
     */
    public function getIsVideoAttribute()
    {
        // Controleer of het type begint met 'video/'
        return $this->media && Str::startsWith($this->media->type, 'video/');
    }

    /**
     * Retrieve the media URL (image or video).
     *
     * @return string|null
     */
    public function getMediaUrlAttribute()
    {
        return $this->media ? $this->media->url : null; // Gebruik 'url' attribuut
    }

    /**
     * Retrieve the post URL.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return route('post.show', $this);
    }

    /**
     * Retrieve the post edit URL.
     *
     * @return string
     */
    public function getEditUrlAttribute()
    {
        return PostResource::getUrl('edit', ['record' => $this]);
    }

    /**
     * Retrieve the post content blocks as an object.
     *
     * @return object
     */
    public function getBlocksAttribute()
    {
        return json_decode(
            collect($this->content ?? [])->toJson()
        );
    }

    /**
     * Retrieve the post excerpt.
     *
     * @return string
     */
    public function getExcerptAttribute()
    {
        $excerpt = collect($this->content)
            ->where('type', 'markdown')
            ->first() ?? [];

        $excerpt = collect(
            explode("\n", Arr::get($excerpt, 'data.content', ''))
        )->first();

        return Str::limit($excerpt, 160);
    }

    /**
     * Retrieve the published posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Retrieve the draft posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDrafts($query)
    {
        return $query->where('is_published', false);
    }
}
