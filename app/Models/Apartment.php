<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // Disable automatic timestamps
    public $timestamps = false;

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
        'cost',
        'total_area',
        'living_area',
        'media',
        'status',
    ];

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
