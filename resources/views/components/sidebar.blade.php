<div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-dark">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/" class="nav-link {{ $sidebar == "main" ? "active" : "" }}" aria-current="page">
                Главная
            </a>
        </li>
        <li>
            <a href="{{ url("histories") }}" class="nav-link  {{ $sidebar == "histories" ? "active" : "" }}">
                Операции
            </a>
        </li>
        <li>
            <a href="{{ url("logout") }}" class="nav-link">
                Выход
            </a>
        </li>

    </ul>
    <hr>
</div>
