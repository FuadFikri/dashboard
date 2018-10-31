 <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="{{ url('/data') }}"><i class="fa fa-database"></i> Data</a></li>
                  <li><a href="{{ url('/trash') }}"><i class="fa fa-trash"></i> Trash</a></li>
                  <li><a href="{{ url('/trash') }}"><i class="fa fa-book"></i> Documentation</a></li>

                </ul>
              </div>
              <div class="menu_section">
                  <ul class="nav side-menu">
                  <li><a><i class="fa fa-sign-out" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</i>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form></a></li>
               </ul>
            </div>
