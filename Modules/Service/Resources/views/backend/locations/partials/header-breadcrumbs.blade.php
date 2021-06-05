<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.locations.index'))
                    Location List
                @elseif(Route::is('admin.locations.create'))
                    Create New Location    
                @elseif(Route::is('admin.locations.edit'))
                    Edit Location <span class="badge badge-info">{{ $location->location_name }}</span>
                @elseif(Route::is('admin.locations.show'))
                    View Location <span class="badge badge-info">{{ $location->location_name }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.locations.edit', $location->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.locations.index'))
                            <li class="breadcrumb-item active" aria-current="page">Location List</li>
                        @elseif(Route::is('admin.locations.create'))
                            <li class="breadcrumb-item"><a href="{{ route('admin.locations.index') }}">Location List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create New Location</li>
                        @elseif(Route::is('admin.locations.edit'))
                            <li class="breadcrumb-item"><a href="{{ route('admin.locations.index') }}">Location List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Location</li>
                        @elseif(Route::is('admin.locations.show'))
                            <li class="breadcrumb-item"><a href="{{ route('admin.locations.index') }}">Location List</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Show Location</li>
                        @endif
                        
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>