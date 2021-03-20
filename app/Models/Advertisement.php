<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    public function languages()
    {
        return $this->belongsToMany(Language::class, 'language_advertisements', 'advertisement_id', 'language_id');
    }
}
