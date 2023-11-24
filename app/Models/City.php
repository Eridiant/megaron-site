<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class City extends Model
{
    // Disable automatic timestamps
    public $timestamps = false;

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'country_id',
        'slug',
        'location',
        'media',
    ];

    // Mutator to automatically encode the images to JSON before saving to the database
    public function setMediaAttribute($value)
    {
        if (is_array($value)) {
            // $adjustedPaths = array_map(function ($path) {
            //     return 'app/images/' . basename($path);
            // }, $value);

            // $this->attributes['media'] = json_encode($adjustedPaths);
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

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function neighborhoods()
    {
        return $this->hasMany(Neighborhood::class);
    }

    public function complexes()
    {
        return $this->hasMany(Complex::class);
    }

    public function tentativeName()
    {
        // First, try to get the English translation
        $englishTranslation = $this->morphOne(Translation::class, 'translatable')
            ->where('column_name', 'name')
            ->where('locale', 'en');

        // If English translation exists, return it
        if ($englishTranslation->exists()) {
            return $englishTranslation;
        }

        // Otherwise, return the first found translation as a fallback
        return $this->morphOne(Translation::class, 'translatable')
            ->where('column_name', 'name')
            ->first();
    }

    public function trname()
    {
        return $this->morphOne(Translation::class, 'translatable')
            ->where('column_name', 'name')
            ->where('locale', app()->getLocale());
    }

    public function trdescription()
    {
        return $this->morphOne(Translation::class, 'translatable')
            ->where('column_name', 'description')
            ->where('locale', app()->getLocale());
    }
}
