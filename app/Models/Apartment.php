<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // Disable automatic timestamps
    public $timestamps = false;

    protected $casts = [
        'image' => 'json',
        'common_video' => 'json',
        'media' => 'json',
    ];

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'apartments'; // Specify the table name if it's not the plural form of the model name.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'slug',
        'complex_id',
        'number_of_rooms',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'cost',
        'total_area',
        'living_area',
        'property_type',
        'type',
        'image' => 'json',
        'common_video' => 'json',
        'media' => 'json',
        'status',
        'rank',
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

    public function complex()
    {
        return $this->belongsTo(Complex::class);
    }

    /**
     * Get the contents for the complex.
     */
    public function contents()
    {
        return $this->hasMany(ApartmentContent::class);
    }
    public function content()
    {
        return $this->hasOne(ApartmentContent::class)->where('lang', app()->getLocale());
    }
}
