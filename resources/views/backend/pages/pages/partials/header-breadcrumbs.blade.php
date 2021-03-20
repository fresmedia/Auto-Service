<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">
                @if (Route::is('admin.pages.index'))
                    Article List
                @elseif(Route::is('admin.pages.create'))
                    Create New Article
                @elseif(Route::is('admin.pages.edit'))
                    Edit Article <span class="badge badge-info">{{ $page->title }}</span>
                @elseif(Route::is('admin.pages.show'))
                    View Article <span class="badge badge-info">{{ $page->title }}</span>
                    <a  class="btn btn-outline-success btn-sm" href="{{ route('admin.pages.edit', $page->id) }}"> <i class="fa fa-edit"></i></a>
                @endif
            </h4>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        @if (Route::is('admin.pages.index'))
                            <li class="breadcrumb-item active" aria-current="page">Article List</li>
                        @elseif(Route::is('admin.pages.create'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Article List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create New Article</li>
                        @elseif(Route::is('admin.pages.edit'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Article List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
                        @elseif(Route::is('admin.pages.show'))
                        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Article List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Show Article</li>
                        @endif

                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
