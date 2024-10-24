<header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)" style="background-color: white;">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav" style="background-color: white;">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end" >
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false" >
                  <span class="user-info" style="color:#115C5B">{{ $admin->email_admin }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                  <form action="{{ route('logout') }}" method="POST" class="d-inline">
                      @csrf
                      <button type="submit" id="logout" class="btn mx-3 mt-2 w-60 d-block shadow-none">Logout</>
                  </form>                            
                </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </nav>
        </header>