<header class="header" id="header">
    <div class="header_toggle">
        <a href="{{ route('home') }}"><img  style="margin: 10px" height="40px" src="{{ asset('images/logo.png') }}"/></a>
    </div>
    <div class="">
        <div class="hand">
            <div class="dropdown">
                <span class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="header_img d-inline">
                        <img class="" src="{{ asset('images/user.png') }}" alt="">
                    </div>
                    @auth
                        <span class="ms-1 cursor pe-2 hand">{{ auth()->User()->name }}</span>
                    @else
                        <span class="ms-1 cursor pe-2 hand">User</span>
                    @endauth
                </span>
                <ul class="dropdown-menu">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))<li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>@endif
                    @else
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item" onclick="event.preventDefault(); this.closest('form').submit();">Logout </a>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>

</header>
