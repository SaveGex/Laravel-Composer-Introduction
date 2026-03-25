    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('posts.index') }}">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>

                    @stack('menu-data')

                    @foreach ($menu as $item)
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs($item['route']) ? 'active' : '' }}"
                                href="{{ route($item['route']) }}">
                                {{ $item['label'] }}
                            </a>
                        </li>
                    @endforeach

                    @hasSection('dropdown-actions')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Actions
                            </a>
                            <ul class="dropdown-menu">
                                @yield('dropdown-actions')
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>