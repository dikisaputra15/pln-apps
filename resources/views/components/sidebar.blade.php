<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">PLN APPS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CT</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{ Route('home') }}"
                    class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="">Unit</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('user.index') }}">Users</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Proses</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="">Target</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="">Realisasi</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
