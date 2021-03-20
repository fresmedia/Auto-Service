<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Word extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'category_id',
        'category',
        'chapter_id',
        'chapter',
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
