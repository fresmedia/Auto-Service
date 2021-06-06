<?php

namespace Modules\Service\Entities\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    
    protected $fillable = [
        'service_title', 
        'service_title_fi', 
        'service_type', 
        'slug', 
        'service_description', 
        'service_description_fi', 
        'meta_description', 
        'meta_description_fi', 
        'service_price', 
        'status',
        'deleted_at', 
        'created_by', 
        'updated_by', 
        'deleted_by'
    ];
}
