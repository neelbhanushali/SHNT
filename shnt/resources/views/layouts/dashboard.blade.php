
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>@yield('page') | {{env('APP_NAME')}}</title>
    <!-- Favicons-->
    <link rel="icon" href="/assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="/assets/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    @section('css')
    <!-- CORE CSS-->
    <link href="/assets/css/themes/collapsible-menu/materialize.css" type="text/css" rel="stylesheet">
    <link href="/assets/css/themes/collapsible-menu/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="/assets/css/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="/assets/vendors/prism/prism.css" type="text/css" rel="stylesheet">
    <link href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="/assets/vendors/flag-icon/css/flag-icon.min.css" type="text/css" rel="stylesheet">
    @show
  </head>
  <body class="layout-dark">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed">
        <nav class="navbar-color gradient-45deg-purple-deep-orange gradient-shadow">
          <div class="nav-wrapper">
            {{--  <div class="header-search-wrapper hide-on-med-and-down sideNav-lock">
              <i class="material-icons">search</i>
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize" />
            </div>  --}}
            <ul class="right hide-on-med-and-down">
              {{--  <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light translation-button" data-activates="translation-dropdown">
                  <span class="flag-icon flag-icon-gb"></span>
                </a>
              </li>  --}}
              {{--  <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen">
                  <i class="material-icons">settings_overscan</i>
                </a>
              </li>  --}}
              {{--  NOTIFICATIONS  --}}
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown">
                  <i class="material-icons">notifications_none
                    <small class="notification-badge">5</small>
                  </i>
                </a>
              </li>
              {{--  NOTIFICATIONS END  --}}
              {{--  PROFILE DROP DOWN  --}}
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button" data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="/assets/images/avatar/avatar-7.png" alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>
              {{--  PROFILE DROP DOWN ENDS  --}}
              {{--  <li>
                <a href="advance-ui-tabs.html#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse">
                  <i class="material-icons">format_indent_increase</i>
                </a>
              </li>  --}}
            </ul>
            <!-- translation-button -->
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>NOTIFICATIONS
                  <span class="new badge">5</span>
                </h6>
              </li>
              <li class="divider"></li>
              <li>
                <a href="advance-ui-tabs.html#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> A new order has been placed!</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li>
                <a href="advance-ui-tabs.html#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">3 days ago</time>
              </li>
              <li>
                <a href="advance-ui-tabs.html#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">4 days ago</time>
              </li>
              <li>
                <a href="advance-ui-tabs.html#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle deep-orange small">today</span> Director meeting started</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">6 days ago</time>
              </li>
              <li>
                <a href="advance-ui-tabs.html#!" class="grey-text text-darken-2">
                  <span class="material-icons icon-bg-circle amber small">trending_up</span> Generate monthly report</a>
                <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">1 week ago</time>
              </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
              <li>
                <a href="{{route('profile')}}" class="grey-text text-darken-1">
                  <i class="material-icons">face</i> Profile</a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{route('logout')}}" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Logout</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- END HEADER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
    <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
        <aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
          <div class="brand-sidebar">
            <h1 class="logo-wrapper">
              <a href="{{route('dashboard')}}" class="brand-logo darken-1">
                {{--  <img src="/assets/images/logo/materialize-logo.png" alt="materialize logo">  --}}
                <span class="logo-text">{{env('APP_NAME')}}</span>
              </a>
              <a href="#" onclick="return false;" class="navbar-toggler">
                <i class="material-icons">radio_button_checked</i>
              </a>
            </h1>
          </div>
          <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="no-padding">
              <ul class="collapsible" data-collapsible="accordion">
                
                
                
                
                @yield('navigation')
                <!-- EXAM CELL NAVIGATION -->
                @if(session()->get('type')=='examcell')
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">library_books</i>
                    <span class="nav-text">Curriculum</span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li>
                        <a href="{{route('examcell.schemes')}}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span>Schemes</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                @endif
                <!-- EXAM CELL NAVIGATION ENDS -->

                <!-- LOGOUT -->
                <li class="bold">
                  <a class="collapsible-header waves-effect waves-cyan">
                    <i class="material-icons">library_books</i>
                    <span class="nav-text"></span>
                  </a>
                  <div class="collapsible-body">
                    <ul>
                      <li>
                        <a href="{{route('examcell.schemes')}}">
                          <i class="material-icons">keyboard_arrow_right</i>
                          <span>Schemes</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- LOGOUT ENDS -->
              </ul>
            </li>
            
          </ul>
          <a href="advance-ui-tabs.html#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-flat btn-medium waves-effect waves-light hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
        </aside>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            {{--  <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>  --}}
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                  <h5 class="breadcrumbs-title">@yield('title')</h5>
                  <ol class="breadcrumbs">
                    @yield('breadcrumbs')
                    {{--  <li><a href="index.html">Dashboard</a>
                    </li>
                    <li><a href="advance-ui-tabs.html#">UI Elements</a>
                    </li>
                    <li class="active">Tabs</li>  --}}
                  </ol>
                </div>
                
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <div class="container">
            @yield('content')
            
          </div>
      </div>
    </div>
    <!-- Floating Action Button -->
    {{--  <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
      <a class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow">
        <i class="material-icons">add</i>
      </a>
      <ul>
        <li>
          <a href="css-helpers.html" class="btn-floating blue">
            <i class="material-icons">help_outline</i>
          </a>
        </li>
        <li>
          <a href="cards-extended.html" class="btn-floating green">
            <i class="material-icons">widgets</i>
          </a>
        </li>
        <li>
          <a href="app-calendar.html" class="btn-floating amber">
            <i class="material-icons">today</i>
          </a>
        </li>
        <li>
          <a href="app-email.html" class="btn-floating red">
            <i class="material-icons">mail_outline</i>
          </a>
        </li>
      </ul>
    </div>  --}}
    @yield('fab')
    <!-- Floating Action Button -->
    </div>
    <!--end container-->
    </section>
    <!-- END CONTENT -->
    
    </div>
    <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <footer class="page-footer gradient-45deg-purple-deep-orange">
      <div class="footer-copyright">
        <div class="container">
          <span>Copyright ©
            <script type="text/javascript">
              document.write(new Date().getFullYear());
            </script> <a class="grey-text text-lighten-4" href="" target="_blank">{{env('APP_NAME')}}</a> All rights reserved.</span>
          <span class="right hide-on-small-only"> Developed by <a class="grey-text text-lighten-4" href="">{{env('APP_NAME')}} Team</a></span>
        </div>
      </div>
    </footer>
    <!-- END FOOTER -->
    @section('js')
    <!-- ================================================
    Scripts
    ================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="/assets/vendors/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="/assets/js/materialize.min.js"></script>
    <!--prism-->
    <script type="text/javascript" src="/assets/vendors/prism/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="/assets/js/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="/assets/js/custom-script.js"></script>
    @show
  </body>
</html>