@if (Route::is('admin.locations.index'))
    Services 
@elseif(Route::is('admin.locations.create'))
    Create New Service
@elseif(Route::is('admin.locations.edit'))
    Edit Service - {{ $location->service_title }}
@elseif(Route::is('admin.locations.show'))
    View Service - {{ $location->service_title }}
@endif
    | Admin Panel - 
    {{ config('app.name') }}