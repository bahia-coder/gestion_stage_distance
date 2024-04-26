<!-- Sidebar Start -->
<aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{asset('storage/imgs/attachments/logo/'. \App\Models\Setting::where('key', 'logo')->value('value') )}}" width="100" height="100" style="margin-left:50px;" alt="" />


          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/stagaire/dashboard" aria-expanded="false">
                <span>
                  <i class="fa fa-home fa-1.5x"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('chat.encadrant')}}" aria-expanded="false">
                <span>
                  <i class="fa fa-home fa-1.5x"></i>
                </span>
                <span class="hide-menu">chat</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{route('list.encadrant')}}" aria-expanded="false">
                <span>
                  <i class="fa fa-home fa-1.5x"></i>
                </span>
                <span class="hide-menu">chat</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">PAGES</span>
            </li>
            
           
           
            <li class="sidebar-item">
            @if(auth('stagaire')->check())
            <a class="sidebar-link"  href="{{ route('logout','stagaire') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
                                    <form id="logout-form" action="{{ route('logout','stagaire') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                        @elseif(auth('employe')->check())
                        <a class="sidebar-link"  href="{{ route('logout','employe') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
                                    <form id="logout-form" action="{{ route('logout','employe') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                      @else
                                      <a class="sidebar-link"  href="{{ route('logout','web') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-login"></i>
                </span>
                <span class="hide-menu">Logout</span>
              </a>
                                    <form id="logout-form" action="{{ route('logout','web') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                      @endif
           
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/Tasks" aria-expanded="false">
                <span>
                  <i class="fa fa-cogs"></i>
                </span>
                <span class="hide-menu">Tasks</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/Testimonial" aria-expanded="false">
                <span>
                  <i class="fa fa-cogs"></i>
                </span>
                <span class="hide-menu">Testimonial</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">EXTRA</span>
            </li>
          
  
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sample-page.html" aria-expanded="false">
                <span>
                  <i class="ti ti-aperture"></i>
                </span>
                <span class="hide-menu">Sample Page</span>
              </a>
            </li>
          </ul>
          <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
