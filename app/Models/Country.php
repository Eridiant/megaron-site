<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    use HasFactory;

    // Disable automatic timestamps
    public $timestamps = false;

    protected $casts = [
        'image' => 'json',
        'common_video' => 'json',
        'media' => 'json',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'slug',
        'latitude',
        'longitude',
        'min_price',
        'image' => 'json',
        'common_video' => 'json',
        'media' => 'json',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
