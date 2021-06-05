<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
  <div class="container">
    <a href="{{ route('index') }}" class="logo"><img src="{{ asset('img/auto.png')  }}" width="100%" title="FRES Media Oy"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link {{ Route::is('index') ? 'active' : '' }}" href="{{ route('index') }}">Home</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.service') ? 'active' : '' }}" href="{{ route('pages.service') }}">Services</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.price') ? 'active' : '' }}" href="{{ route('pages.price') }}">Prices</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.online') ? 'active' : '' }}" href="{{ route('pages.online') }}">Online</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.offer') ? 'active' : '' }}" href="{{ route('pages.offer') }}">Offers</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.about') ? 'active' : '' }}" href="{{ route('pages.about') }}">About us</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('pages.contact') ? 'active' : '' }}" href="{{ route('pages.contact') }}">Contact</a></li>
      </ul>
      <div class="btn-group">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</button>
          <div class="dropdown-menu dropdown-menu-left languages">
            <h1><a href="">FI (Suomi)</a></h1>
          </div>
      </div>
    </div>
  </div>
</nav>
