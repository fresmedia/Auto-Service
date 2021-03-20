<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [

        'category', // Could be database ID or boolean
        'country', // Could be database ID or boolean
        'language', // Could be database ID or boolean
        'menu', // Boolean
        'footer', // Boolean
        'content', // Boolean

        'key', // key as slug

        // Translated values for different languages
        'en',
        'fi',
        'se',
        'no',
        'dk',
        'de',
        'it',
        'fr',
        'es',
        'pl',
        'al',
        'ru',
        'ar',
        'bn',
        'so',
        'ku',
        'vi',
        'cn',
        'sr',
        'tr',
        'order_nr',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
}
