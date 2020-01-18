<?php
declare(strict_types=1);


namespace App\Entities;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Eloquent\Model;

class Comment extends Model
{
    /**
     * DB Connection to use
     *
     * @var string
     */
    protected $connection = 'mongodb';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'created_at', 'post_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime'
    ];

    /**
     * Get the post associated with the comment.
     *
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo('Post');
    }
}
