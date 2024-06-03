<!--  Header Start  profile-->
<header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav flex-row ms-auto align-items-center">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
    <a class="nav-link" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ti ti-bell-ringing"></i>
        <div class="notification bg-primary rounded-circle"></div>
    </a>
    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="notificationDropdown">
        <div class="col-lg-12 col-sm-12 col-12">
            <span>Notifications ({{ auth('stagaire')->user()->unreadNotifications->count() }})</span>
            <a href="" class="float-right text-light">Mark all as read</a>
        </div>
        <!-- Notifications -->
        @foreach(auth('stagaire')->user()->unreadNotifications()->whereType('App\Notifications\CreateAnnonce')->get() as $notification)
        <a href="{{ route('annonce.pdf', $notification->data['annonce_id']) }}" class="dropdown-item">
            <div class="notification-box">
                <div class="row">
                    <div class="col-lg-8 col-sm-8 col-8">
                    <div><strong class="text-info">Annonce:</strong>{{ $notification->data['annonce_title'] }}</div>
                        
                        
                        <small class="text-warning">{{ $notification->created_at }}</small>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        @if((auth('stagaire')->user()->unreadNotifications()->whereType('App\Notifications\CreateTache')->count())!=0)
        <a href="/Tasks" class="dropdown-item">
            <div class="notification-box">
                <div class="row">
                    <div class="col-lg-8 col-sm-8 col-8">
                    <div><strong class="text-info">{{auth('stagaire')->user()->unreadNotifications()->whereType('App\Notifications\CreateTache')->count()}} new tasks have been created.</strong></div>
                    </div>
                </div>
            </div>
        </a>
        @endif
        @if((auth('stagaire')->user()->unreadNotifications()->whereType('App\Notifications\CreateMeeting')->count())!=0)
        <a href="/Meetings" class="dropdown-item">
            <div class="notification-box">
                <div class="row">
                    <div class="col-lg-8 col-sm-8 col-8">
                    <div><strong class="text-info">{{auth('stagaire')->user()->unreadNotifications()->whereType('App\Notifications\CreateMeeting')->count()}} new Meetings have been created.</strong></div>
                    </div>
                </div>
            </div>
        </a>
      @endif
    </div>
</li>

          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @if(auth('stagaire')->check())
    {{ auth('stagaire')->user()->FullName }}
    @else
    {{ auth('employe')->user()->FullName }}
    @endif

            </a>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  @if(auth('stagaire')->check())
                  <img src="{{asset('storage/imgs/'.auth('stagaire')->user()->photo) }}" alt="" width="35" height="35" class="rounded-circle">
                  @else
                  <img src="{{asset('storage/imgs/'.auth('employe')->user()->photo) }}" alt="" width="35" height="35" class="rounded-circle">
                  @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="{{route('stagaire_profile')}}" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    
                    
                    @if(auth('stagaire')->check())
                    <a class="dropdown-item" href="{{ route('logout','stagaire') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout','stagaire') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                        @elseif(auth('employe')->check())
                        <a class="dropdown-item" href="{{ route('logout','employe') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout','employe')  }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                      @else
                                      <a class="dropdown-item" href="{{ route('logout','web') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout','web') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                      @endif

                                            </form>





                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
