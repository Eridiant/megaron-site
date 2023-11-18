<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplexContent extends Model
{
    // Disable automatic timestamps
    public $timestamps = false;

    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'complex_content'; // Specify the table name if it's not the plural form of the model name.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'complex_id', 
        'lang', 
        'name', 
        'description'
    ];

    /**
     * Get the complex that owns the content.
     */
    public function complex()
    {
        return $this->belongsTo(Complex::class);
    }

    protected static function booted(): void
    {
        static::created(function (ComplexContent $cc) {
            $cc->lang = app()->getLocale();
        });
        static::updated(function (ComplexContent $cc) {
            $cc->lang = app()->getLocale();
        });
    }
}
