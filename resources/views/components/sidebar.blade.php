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
                <a href="{{ Route('homev1') }}"
                    class="nav-link"><i class="fas fa-map-marker-alt"></i><span>Info Grafis</span></a>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ Route('unit.index') }}">Unit</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('user.index') }}">Users</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Performance Management</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ Route('target.index') }}">Realisasi KPI</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('real.index') }}">Rekap Kinerja</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="{{ Route('home') }}"
                    class="nav-link"><i class="fas fa-plug"></i><span>Mitigasi Risiko (RKM)</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ url('monitoringbulanan') }}"
                    class="nav-link"><i class="fas fa-columns"></i><span>Monitoring Bulanan</span></a>
            </li>
        </ul>
    </aside>
</div>
