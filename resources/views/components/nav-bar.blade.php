<nav class="navbar border-bottom border-body">
    <div class="container-fluid  ">
        <x-button-icon type="button" id="btnDarkMode" class=""
            aria-label="Toggle Sidegbar" id="btn-toggle-sidebar">
            <x-icon.bi-grid-fill></x-icon.bi-grid-fill>
            <!-- Menu -->
        </x-button-icon>
        <a class="navbar-brand m-0" href="{{ route('page.dashboard') }}">Codingduluaja</a>
        <div class="d-flex align-items-center">
            <x-button-icon type="button" id="btnDarkMode" class=""
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-title="Theme">
                <x-icon.brightness-high></x-icon.brightness-high>
            </x-button-icon>
            <div class="vr"></div>
            <form class="d-flex" action="{{ route('do.logout') }}" method="POST">
                @csrf
                <x-button-icon type="submit" class="btn d-flex"
                    data-bs-toggle="tooltip"
                    data-bs-placement="top"
                    data-bs-title="Logout">
                    <x-icon.bi-box-arrow-right></x-icon.bi-box-arrow-right>
                </x-button-icon>
            </form>
        </div>
    </div>
</nav>
