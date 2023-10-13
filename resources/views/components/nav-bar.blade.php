<nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid  ">
        <!-- <div class=" btn fs-2 d-flex align-items-center" aria-label="Toggle Sidegbar" id="btn-toggle-sidebar">
            <x-icon.bi-grid-fill></x-icon.bi-grid-fill>
        </div> -->
        <x-button-icon type="button" id="btnDarkMode" class="btn-outline-light"
            aria-label="Toggle Sidegbar" id="btn-toggle-sidebar">
            <x-icon.bi-grid-fill></x-icon.bi-grid-fill>
        </x-button-icon>
        <a class="navbar-brand" href="{{ route('page.dashboard') }}">Codingduluaja</a>
        <div class="d-flex align-items-center">
            <x-button-icon type="button" id="btnDarkMode" class="btn-outline-light">
                <x-icon.circle></x-icon.circle>
            </x-button-icon>
            <!-- <button id='btnDarkMode'>mode</button> -->
            <form class="d-flex" action="{{ route('do.logout') }}" method="POST">
                @csrf
                <x-button-icon type="submit" class="btn btn-sm d-flex">
                    <x-icon.bi-box-arrow-right></x-icon.bi-box-arrow-right>
                </x-button-icon>
            </form>
        </div>
    </div>
</nav>
