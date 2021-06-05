<?php

namespace Modules\Service\Entities\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceLocation extends Model
{
    protected $table = 'service_locations';
    
    protected $fillable = [
        'location_name', 'location_name_fi', 'status','deleted_at', 'created_by', 'updated_by', 'deleted_by'
    ];
    
}
