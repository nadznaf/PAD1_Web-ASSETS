<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar" data-simplebar>
        <div class="d-flex mb-4 align-items-center justify-content-between">
            <a href="{{ route('admin.dashboard') }}" class="text-nowrap logo-img ms-0 ms-md-1">
              <img src="{{ asset('imagesAdmin/logoHijauAssets.svg') }}" width="180" alt="">
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="mb-4 pb-2">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a
                class="sidebar-link sidebar-link success-hover-bg"
                href="{{ route('admin.dashboard') }}"
                aria-expanded="false"
              >
                <span class="aside-icon p-2 rounded-3" style="background-color:#115C5B">
                  <i class="ti ti-home fs-7 text-light"></i>
                </span>
                <span class="hide-menu ms-2 ps-1">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
              <span class="hide-menu">Data</span>
            </li>
            <li class="sidebar-item">
              <a
                class="sidebar-link sidebar-link success-hover-bg"
                href="{{ route('admin.datamahasiswa.index') }}"
                aria-expanded="false"
              >
                <span class="aside-icon p-2 rounded-3 bg-light-success" >
                  <i class="ti ti-user fs-7 text-secondary"></i>
                </span>
                <span class="hide-menu ms-2 ps-1">Data Mahasiswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a
                class="sidebar-link sidebar-link success-hover-bg"
                href="{{ route('admin.datadosen.index') }}"
                aria-expanded="false"
              >
                <span class="aside-icon p-2 bg-light-success rounded-3">
                  <i class="ti ti-user fs-7 text-secondary"></i>
                </span>
                <span class="hide-menu ms-2 ps-1">Data Dosen Pebimbing</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a
                class="sidebar-link sidebar-link success-hover-bg"
                href="{{ route('admin.datakabinet.index') }}"
                aria-expanded="false"
              >
                <span class="aside-icon p-2 bg-light-success rounded-3">
                  <i class="ti ti-article fs-7 text-secondary"></i>
                </span>
                <span class="hide-menu ms-2 ps-1">Data Kabinet</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a
                class="sidebar-link sidebar-link success-hover-bg"
                href="{{ route('admin.datacolorpallete.index') }}"
                aria-expanded="false"
              >
                <span class="aside-icon p-2 bg-light-success rounded-3">
                  <i class="ti ti-palette fs-7 text-secondary"></i>
                </span>
                <span class="hide-menu ms-2 ps-1">Data Color Pallete</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a
                class="sidebar-link sidebar-link success-hover-bg"
                href="{{ route('admin.datadivisi.index') }}"
                aria-expanded="false"
              >
                <span class="aside-icon p-2 bg-light-success rounded-3">
                  <i class="ti ti-article fs-7 text-secondary"></i>
                </span>
                <span class="hide-menu ms-2 ps-1">Data Divisi</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-5"></i>
              <span class="hide-menu">Auth</span>
            </li>
            <li class="sidebar-item">
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
              @csrf
              <button type="submit" class="sidebar-link warning-hover-bg d-flex align-items-center bg-transparent border-0 p-0" aria-expanded="false">
                <span class="aside-icon p-2 bg-light-warning rounded-3">
                  <i class="ti ti-login fs-7 text-danger"></i>
                </span>
                <span class="hide-menu ms-2 ps-1">Logout</span>
              </button>
            </form>
          </li>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>