<ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                @if(Auth::user()->gambar == '')

                  <img src="{{asset('images/user/default.png')}}" alt="profile image">
                @else

                  <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->nama}}</p>
                  <div>
                    <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>


           <li class="nav-item {{ setActive(['/', 'DashboardKajur']) }}"> 
            <a class="nav-link" href="{{url('/')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item {{ setActive(['listvalidasikajur*','sudahdivalidasikajur*']) }}">
            <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi mdi-database"></i>
              <span class="menu-title">Validasi Pendaftaran PPL</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ setShow(['listbelumdivalidasikajur*','listsudahdivalidasikajur*']) }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                 <li class="nav-item">
                  <a class="nav-link {{ setActive(['listbelumdivalidasikajur*']) }}" href="{{url('/listbelumdivalidasikajur')}}">Belum divalidasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['listsudahdivalidasikajur*']) }}" href="{{url('listsudahdivalidasikajur')}}">Sudah divalidasi</a>
                </li>
              </ul>
            </div>
          </li>
 
        </ul>