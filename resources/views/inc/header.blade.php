<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
    </div>

    <div class="top-right links" style="margin-right: 11px">

        @auth('employee')
            <span id="userName">{{ Auth::guard('employee')->user()->email }}</span>
            <a href="{{ route('logout') }}" id="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="text-decoration: none;">
                Выйти
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('auth-form') }}" class="btn btn-outline-primary me-2" id="headerAuthButton">Войти</a>
            <a href="{{ route('register-form') }}" class="btn btn-primary" id="headerRegisterButton">Регистрация</a>
        @endauth
    </div>

</header>
