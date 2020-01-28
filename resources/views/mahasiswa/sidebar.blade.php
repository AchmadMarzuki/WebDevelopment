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

          <li class="nav-item {{ setActive(['/', 'home']) }}"> 
            <a class="nav-link" href="{{url('/')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item {{ setActive(['/', 'PendaftaranPPL']) }}"> 
            <a class="nav-link" href="{{url('/PendaftaranPPL')}}">
              <i class="menu-icon mdi mdi-account-check"></i>
              <span class="menu-title">Pendaftaran PPL</span>
            </a>
          </li>

          <li class="nav-item {{ setActive(['/', 'listpendaftar']) }}"> 
            <a class="nav-link" href="{{url('/listpendaftar')}}">
              <i class="menu-icon mdi mdi-checkbox-marked-outline"></i>
              <span class="menu-title">Status Validasi</span>
            </a>
          </li>
 
        </ul>