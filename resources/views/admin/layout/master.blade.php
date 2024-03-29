<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MapBirdy @yield('mytitle')</title>

  <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('public/frontend/node_modules/mdi/css/materialdesignicons.min.css') }}">
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('public/frontend/images/favicon.png') }}" />
  <!-- icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  @yield('css')
</head>

<body>
  <div class="body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <aside class="mdc-persistent-drawer mdc-persistent-drawer--open">
      <nav class="mdc-persistent-drawer__drawer">
        <div class="mdc-persistent-drawer__toolbar-spacer">
          <a href="index.html" class="brand-logo"></a>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
          <div class="mdc-list-item mdc-drawer-item">
              <!-- <div style="font-family: fantasy,cursive;color: #00a9f4;font-size:30px">NEIGHBOURHOOD</div>
              <h4 style="font-style:italic;">Analytics</h4> -->
              <a href="index.html" class="brand-logo">
						<img src="{{ asset('public/frontend/images/mainLOGO.png') }}" alt="logo">
					</a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="{{ url('admin/dashboard') }}">
              <i class="bi bi-house-fill"></i>
                Dashboard
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="{{ url('admin/question') }}">
              <i class="bi bi-chat-fill"></i>
                Questions
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="{{ url('admin/comment') }}">
              <i class="bi bi-chat-right-text"></i>
                Comments
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="{{ url('admin/contact_list') }}">
              <i class="bi bi-person-lines-fill"></i>
                Inbox
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="{{ url('admin/profile') }}">
              <i class="bi bi-gear"></i>
                Settings
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="{{ url('admin/logout') }}">
              <i class="bi bi-power"></i>
                Logout
              </a>
            </div>
          </nav>
        </div>
      </nav>
    </aside>
    <!-- partial -->
    <!-- partial:partials/_navbar.html -->
    <header class="mdc-toolbar mdc-elevation--z4 mdc-toolbar--fixed">
      <div class="mdc-toolbar__row">
        <section class="mdc-toolbar__section mdc-toolbar__section--align-start">
          <a href="#" class="menu-toggler material-icons mdc-toolbar__menu-icon"><i class="bi bi-list"></i></a>

        </section>
        <section class="mdc-toolbar__section mdc-toolbar__section--align-end" role="toolbar">
          <!--<div class="mdc-menu-anchor">-->
          <!--  <a href="#" class="mdc-toolbar__icon toggle mdc-ripple-surface" data-toggle="dropdown" toggle-dropdown="notification-menu" data-mdc-auto-init="MDCRipple">-->
          <!--  <i class="bi bi-hand-index-fill"></i>2000-->
              <!-- <span class="dropdown-count"></span> -->
          <!--  </a>-->

          <!--</div>-->
          <!--<div class="mdc-menu-anchor">-->
          <!--  <a href="#" class="mdc-toolbar__icon mdc-ripple-surface" data-mdc-auto-init="MDCRipple">-->
          <!--    <i class="bi bi-chat-left-dots-fill"></i>2000-->
              <!-- <span class="dropdown-count">3</span> -->
          <!--  </a>-->
          <!--</div>-->

        </section>
      </div>
    </header>
    <div class="page-wrapper mdc-toolbar-fixed-adjust">
    <!-- partial Start-->
    @yield('content')
    <!-- partial End-->
       <!-- partial:partials/_footer.html -->
       <footer>
        <div class="mdc-layout-grid">
          <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6">
              <span class="text-muted">Powered by  <a class="text-red" href="https://www.kodevglobal.com/" target="_blank">Kodev Global Pvt Ltd</a></span>
            </div>

          </div>
        </div>
      </footer>
      <!-- partial -->
    </div>
 <!-- partial end -->
  </div>
  <!-- body wrapper -->
  <!-- plugins:js -->

  <script src="{{ asset('public/frontend/node_modules/material-components-web/dist/material-components-web.min.js') }}"></script>
  <script src="{{ asset('public/frontend/node_modules/jquery/dist/jquery.min.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('public/frontend/node_modules/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('public/frontend/node_modules/progressbar.js/dist/progressbar.min.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('public/frontend/js/misc.js') }}"></script>
  <script src="{{ asset('public/frontend/js/material.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('public/frontend/js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    @if (Session::get('msg'))
$(document).ready(function(){
    var txt ="<?php echo Session::get('msg');?> ";
    var alert ="<?php echo Session::get('alert');?>";
    swal("",txt, alert)
}); @endif
</script>

  @yield('js')
</body>

</html>
