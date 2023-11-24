<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    // Disable automatic timestamps
    public $timestamps = false;

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'neighborhoods';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'city_id',
        'slug',
        'location',
        'polygon',
        'media',
    ];

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

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function complexes()
    {
        return $this->hasMany(Complex::class);
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
