<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsContent extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news_content';

    public $timestamps = false;

    protected $casts = [
        'image' => 'json',
        'gallery' => 'json',
        'video' => 'json',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'news_id',
        'lang',
        'content',
        'text_type',
        'media_type',
        'image',
        'gallery',
        'video',
        'type',
    ];
}
