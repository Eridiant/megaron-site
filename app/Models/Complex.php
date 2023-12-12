<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complex extends Model
{
    // Disable automatic timestamps
    public $timestamps = false;

    protected $casts = [
        'types' => 'json',
        'number_of_rooms' => 'json',
        'image' => 'json',
        'common_video' => 'json',
        'media' => 'json',
        'delivery_date' => 'datetime'
    ];

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complexes'; // Specify the table name if it's not the plural form of the model name.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
        'delivery_date',
        'city_id',
        'neighborhood_id',
        'developer_id',
        'types' => 'json',
        'number_of_rooms' => 'json',
        'image' => 'json',
        'common_video' => 'json',
        'media' => 'json',
        'min_price',
        'latitude',
        'longitude',
        'status',
        'rank',
    ];

    // protected static function booted(): void
    // {
    //     static::created(function (Complex $model) {
    //         $model->media = json_encode(["id" => 1, "url" => "https://www.google.com"]);
    //         $model->content->lang = app()->getLocale();
    //     });
    //     static::updated(function (Complex $model) {
    //         $model->media = json_encode(["id" => 1, "url" => "https://www.google.com"]);
    //         $model->content->lang = app()->getLocale();
    //     });
    // }

    public function apartments()
    {
        return $this->hasMany(Apartment::class);
        // return $this->hasMany(Apartment::class, 'complex_id');
    }

    /**
     * Get the contents for the complex.
     */
    public function contents()
    {
        return $this->hasMany(ComplexContent::class);
    }
    public function content()
    {
        return $this->hasOne(ComplexContent::class)->where('lang', app()->getLocale());
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function neighborhood()
    {
        return $this->belongsTo(Neighborhood::class);
    }

    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }

    /**
     * Get or create the content for the current language.
     */
    public function getContentForCurrentLanguageAttribute()
    {
        $currentLanguage = app()->getLocale();
        $content = $this->contents()->where('lang', $currentLanguage)->first();
    
        if (!$content) {
            // Handle creation logic here, potentially return a new but unsaved instance
            // or handle this creation logic in the controller.
            $content = new ComplexContent(['lang' => $currentLanguage]);
        }
    
        return $content;
    }

    // Mutator to automatically encode the images to JSON before saving to the database
    public function setMediaAttribute($value)
    {
        if (is_array($value)) {
            $value = array_values($value);
        } elseif (is_object($value)) {
            // Convert objects to arrays
            $value = (array) $value;
        }
        $this->attributes['media'] = json_encode($value);
    }

    public function getMediaAttribute($value)
    {
        return json_decode($value, true);
    }

    // public function getContentByLanguage($languageKey)
    // {
    //     return $this->contents()->where('lang', $languageKey)->first();
    // }

    // public function getCurrentLanguageContentAttribute()
    // {
    //     $languageKey = app()->getLocale(); // Get the current locale/language key
    //     return $this->contents()->where('lang', $languageKey)->first();
    // }
}
