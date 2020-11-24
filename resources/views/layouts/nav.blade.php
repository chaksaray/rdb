<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">
        
        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
            asvawat
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apps <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('back-users.index') }}">Back Users</a>
                            <a class="dropdown-item" href="{{ route('back-user-roles.index') }}">Back User Roles</a>
                            <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                            <a class="dropdown-item" href="{{ route('account-types.index') }}">Account Types</a>
                            <a class="dropdown-item" href="{{ route('toptics.index') }}">Toptics</a>
                            <a class="dropdown-item" href="{{ route('statuses.index') }}">Statuses</a>
                            <a class="dropdown-item" href="{{ route('article-statuses.index') }}">Article Statuses</a>
                            <a class="dropdown-item" href="{{ route('report-article-types.index') }}">Report Article Types</a>
                            <a class="dropdown-item" href="{{ route('report-user-types.index') }}">Report User Types</a>
                            <a class="dropdown-item" href="{{ route('genders.index') }}">Genders</a>
                            <a class="dropdown-item" href="{{ route('news-letter-types.index') }}">News Letter Types</a>
                            <a class="dropdown-item" href="{{ route('notification-types.index') }}">Notification Types</a>
                            <a class="dropdown-item" href="{{ route('page-roles.index') }}">Page Roles</a>
                            <a class="dropdown-item" href="{{ route('freq-ask-questions.index') }}">Freq Ask Questions</a>
                            <a class="dropdown-item" href="{{ route('payment-methods.index') }}">Payment Methods</a>
                            <a class="dropdown-item" href="{{ route('pages.index') }}">Pages</a>
                            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                            <a class="dropdown-item" href="{{ route('page-users.index') }}">Page Users</a>
                        </div>

                    </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>