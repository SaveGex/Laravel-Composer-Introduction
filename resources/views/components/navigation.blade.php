<div>
    <!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
    <nav class="navbar bg-body-tertiary navbar-expand-lg">
        <div class="container-fluid">
            <!-- burger for small screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach ($getMenu() as $item)
                        @if (!$item['is_active'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- custom data -->
            <div class="d-flex align-items-center gap-3">
                {{ $slot }}
            </div>

        </div>
    </nav>
</div>
