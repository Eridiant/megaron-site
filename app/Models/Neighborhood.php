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
        'name',
        'description',
        'location',
        'polygon',
        'media',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function complexes()
    {
        return $this->hasMany(Complex::class);
    }
}
