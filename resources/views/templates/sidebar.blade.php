 <div class="menu_section">
                <ul class="nav side-menu">
                    @if($user = Auth::user())
                    <li><a href="{{ url('/data') }}"><i class="fa fa-database"></i> Data</a></li>
                    <li><a href="{{ url('/trash') }}"><i class="fa fa-trash"></i> Trash</a></li>
                    <li><a><i class="fa fa-book"></i> Documentation <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ url('/Documentation#Index') }}">Index</a></li>
                        <li><a href="{{ url('/Documentation#Show') }}">Show</a></li>
                      </ul>
                    </li>
                    @else
                    <li><a><i class="fa fa-book"></i> Documentation <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="{{ url('/Documentation#Index') }}">Index</a></li>
                          <li><a href="{{ url('/Documentation#Show') }}">Show</a></li>
                      </ul>
                    </li>
                    @endif
                </ul>
              </div>
              <div class="menu_section">
            </div>
