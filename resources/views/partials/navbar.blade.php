<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <a class="btn btn-info  mr-2" href="{{route('auth.login.form')}}">@lang('public.login')</a>
                    <a class="btn btn-info mr-2" href="{{route('auth.register.form')}}">@lang('public.register')</a>
                @endguest

                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                {{Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu logout-btn" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('auth.logout')}}">@lang('auth.logout')</a>
                            </div>
                        </li>
                    </ul>
                @endauth
            </ul>
        </div>
    </div>
</nav>
