<!DOCTYPE html>
<html lang="en">
  @include('templates/_head')

  <body class="nav-md"><!-- edit warna -->
      <style>
            .my_text
            {
                font-family:    Arial, Helvetica, sans-serif;
                font-size:      24px;
                font-weight:    bold;
            }
        </style>
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col"><!-- edit warna -->
          <div class="left_col scroll-view"  ><!-- edit warna -->
            <div class="navbar nav_title" style="border: 0;"><!-- edit warna -->
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i>
                  <span>
                      @if($user = Auth::user())
                        Dashboard Admin
                      @else
                          Documentation
                      @endif
                </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <div class="my_text">
                    Welcome
                </div>
                @if($user = Auth::user())
                        {{ Auth::user()->name }}
                @else
                    Guest
                @endif
                <h2></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                @include('templates.sidebar')
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt="">
                    @if($user = Auth::user())
                        {{ Auth::user()->name }}
                    @else
                        Guest
                    @endif
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                      @if($user = Auth::user())
                      <li><a href="javascript:;"> Profile</a></li>
                      <li><a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                       <i class="fa fa-sign-out pull-right">
                                                       </i>
                                                       Log Out
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>
                      </li>
                      @else
                      <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                      @endif
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

       <!-- modal content -->
         @include('modal/_modal')
        <!-- /modal content -->

        {{-- content --}}
            @yield('konten')
        {{-- endconten --}}

        <!-- footer content -->
         @include('templates/_footer')
        <!-- /footer content -->
      </div>
    </div>

    @include('templates/_script')
    @stack('scripts')
    @stack('scripts2')
  </body>
</html>
