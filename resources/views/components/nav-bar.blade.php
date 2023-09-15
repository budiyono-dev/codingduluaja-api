<nav class="navbar navbar-light">
    <div class="container-fluid  ">
        <div class=" btn btn-light fs-2 d-flex align-items-center" aria-label="Toggle Sidegbar" id="btn-toggle-sidebar">
            <x-icon.bi-grid-fill></x-icon.bi-grid-fill>
        </div>
        <a class="navbar-brand" href="{{ route('page.dashboard') }}">Codingduluaja</a>
        <div class="d-flex align-items-center">
            <form class="d-flex" action="{{ route('do.logout') }}" method="POST">
                @csrf
                <x-button-icon type="submit" class="btn btn-sm d-flex btn-light">
                    <x-icon.bi-box-arrow-right></x-icon.bi-box-arrow-right>
                </x-button-icon>
            </form>
        </div>
    </div>
</nav>
