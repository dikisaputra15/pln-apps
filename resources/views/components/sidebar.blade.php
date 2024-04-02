<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ Route('home') }}">PLN APPS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ Route('home') }}">APPS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item">
                <a href="{{ Route('home') }}"
                    class="nav-link"><i class="fas fa-map-marker-alt"></i><span>Info Grafis</span></a>
            </li>

            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="far fa-file-alt"></i><span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ Route('unitinduk.index') }}">Unit Induk</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('unitpelaksana.index') }}">Unit Pelaksana</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('unitlayanan.index') }}">Unit Layanan</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('satuan.index') }}">Satuan</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('kategori.index') }}">Kategori</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('aspirasi.index') }}">Aspirasi</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="{{ Route('user.index') }}">Users</a>
                    </li>
                </ul>
            </li>

            <!-- <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-th-large"></i><span>Performance Management</span></a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link"
                            href="{{ url('allperformance') }}">All Performance</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="">Realisasi KPI</a>
                    </li>
                    <li>
                        <a class="nav-link"
                            href="">Rekap Kinerja</a>
                    </li>
                </ul>
            </li> -->

            <li class="nav-item">
                <a href="{{ Route('indikator.index') }}" class="nav-link"><i class="fas fa-th-large"></i><span>Indikator</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ url('rkm') }}"
                    class="nav-link"><i class="fas fa-plug"></i><span>Mitigasi Risiko (RKM)</span></a>
            </li>

            <li class="nav-item">
                <a href="{{ url('monitoringbulanan') }}"
                    class="nav-link"><i class="fas fa-columns"></i><span>Monitoring Bulanan</span></a>
            </li>
        </ul>
    </aside>
</div>
