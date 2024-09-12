<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('nigai') }}" class="nav-link {{ Request::is('payung') ? 'active' : '' }}">
        <i class="bi bi-person-circle"></i>
        <p>User</p>
    </a>
</li>

<li class="nav-item has-treeview {{ Request::is('surat*')  ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('surat*')  ? 'active' : '' }}">
        <i class="nav-icon bi bi-envelope"></i>
        <p>
            Layanan Warga
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('surat.index') }}" class="nav-link {{ Request::is('surat') ? 'active' : '' }}">
                <p>Surat</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview {{  Request::is('jenis_surats*') || Request::is('kategoris*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{  Request::is('jenis_surats*') || Request::is('kategoris*') ? 'active' : '' }}">
        <i class="bi bi-folder-fill"></i>
        <p>
            Doc
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('jenis_surats.index') }}" class="nav-link {{ Request::is('jenis_surats') ? 'active' : '' }}">
                <p>Jenis Surat</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kategoris.index') }}" class="nav-link {{ Request::is('kategoris') ? 'active' : '' }}">
                <p>Kategori</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview {{ Request::is('penduduk*')  ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('penduduk*')  ? 'active' : '' }}">
        <i class="nav-icon bi bi-person"></i>
        <p>
            Daftar Penduduk
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('rakka') }}" class="nav-link {{ Request::is('penduduk') ? 'active' : '' }}">
                <p>Penduduk</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview {{ Request::is('pekerjaan*') ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ Request::is('pekerjaan*') ? 'active' : '' }}">
        <i class="bi bi-coin"></i>
        <p>
            List Pekerjaan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="{{ route('reki') }}" class="nav-link {{ Request::is('pekerjaan') ? 'active' : '' }}">
                <p>Pekerjaan</p>
            </a>
        </li>
    </ul>
</li>

