@if (Route::is('admin.locations.index'))
    Locations 
@elseif(Route::is('admin.locations.create'))
    Create New Location
@elseif(Route::is('admin.locations.edit'))
    Edit Location - {{ $location->location_name }}
@elseif(Route::is('admin.locations.show'))
    View Location - {{ $location->location_name }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}