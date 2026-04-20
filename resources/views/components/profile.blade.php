<!-- An unexamined life is not worth living. - Socrates -->
<div class="nav-item dropdown">
    @auth
        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ auth()->user()->avatar_url }}" alt="Avatar" class="rounded-circle" width="32" height="32" style="object-fit: cover;">
        </a>

        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
            <li><h6 class="dropdown-header">Manage Account</h6></li>
            <li><a class="dropdown-item" href="{{ route('profile.show')}}">My Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="px-2">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-danger w-100 d-flex align-items-center justify-content-center gap-2">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    @endauth

    @guest
        <div class="d-flex gap-2">
            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Register</a>
        </div>
    @endguest
</div>