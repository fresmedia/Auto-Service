<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <div class="container">
    <a href="{{ route('index') }}" class="logo"><img src="{{ asset('img/auto.png')  }}" width="100%" title="FRES Media Oy"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link {{ Route::is('index') ? 'active' : '' }}" href="{{ route('index') }}">{{ __('header.home') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.service') ? 'active' : '' }}" href="{{ route('pages.service') }}">{{ __('header.services') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.price') ? 'active' : '' }}" href="{{ route('pages.price') }}">{{ __('header.prices') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.online') ? 'active' : '' }}" href="{{ route('pages.online') }}">{{ __('header.online') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.offer') ? 'active' : '' }}" href="{{ route('pages.offer') }}">{{ __('header.offers') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.about') ? 'active' : '' }}" href="{{ route('pages.about') }}">{{ __('header.about_us') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.contact') ? 'active' : '' }}" href="{{ route('pages.contact') }}">{{ __('header.contact') }}</a></li>
      </ul>
      <div class="btn-group">
        @if(app()->getLocale() == 'en')
          <a type="button" class="btn btn-secondary" aria-haspopup="true" aria-expanded="false" href="{{ url('locale/fi') }}">FI</a>
        @elseif(app()->getLocale() == 'fi')
          <a class="btn btn-secondary" aria-haspopup="true" aria-expanded="false" href="{{ url('locale/en') }}">En</a>
        @else
          <a class="btn btn-secondary" aria-haspopup="true" aria-expanded="false" href="{{ url('locale/en') }}">En</a>
        @endif
      </div>
    </div>
  </div>
</nav>
