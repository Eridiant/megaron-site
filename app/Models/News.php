<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    protected $casts = [
        'image' => 'json',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
        'status',
        'image',
    ];

    public function contents()
    {
        return $this->hasMany(NewsContent::class)->where('lang', app()->getLocale());
    }

    public function content()
    {
        return $this->hasOne(NewsContent::class)->where('lang', app()->getLocale());
    }

    public function seo()
    {
        return $this->hasOne(NewsSeo::class)->where('lang', app()->getLocale());
    }

    public function trtitle()
    {
        return $this->morphOne(Translation::class, 'translatable')
            ->where('column_name', 'title')
            ->where('locale', app()->getLocale());
    }

    public function trexcerpt()
    {
        return $this->morphOne(Translation::class, 'translatable')
            ->where('column_name', 'excerpt')
            ->where('locale', app()->getLocale());
    }
}
