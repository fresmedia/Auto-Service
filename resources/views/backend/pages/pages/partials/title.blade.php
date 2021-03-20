@if (Route::is('admin.pages.index'))
Articles
@elseif(Route::is('admin.pages.create'))
Create New Article
@elseif(Route::is('admin.pages.edit'))
Edit Article - {{ $page->title }}
@elseif(Route::is('admin.pages.show'))
View Article - {{ $page->title }}
@endif
| Admin Panel -
{{ config('app.name') }}
