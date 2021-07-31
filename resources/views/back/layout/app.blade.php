<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/back/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="/back/dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="/back/dist/css/custom-style.css">
  <link rel="stylesheet" href="{{ asset('back/css/style.css') }}">
  <style>
    .active_nav{
      color: #fff;
      background-color: rgba(255,255,255,.1);
    }
  </style>
  <link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css') }}">
  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link">خانه</a>
          </li>
        </ul>
    
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
        </form>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav mr-auto">
          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-comments-o"></i>
              <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      حسام موسوی
                      <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                    </h3>
                    <p class="text-sm">با من تماس بگیر لطفا...</p>
                    <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      پیمان احمدی
                      <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                    </h3>
                    <p class="text-sm">من پیامتو دریافت کردم</p>
                    <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="media">
                  <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                  <div class="media-body">
                    <h3 class="dropdown-item-title">
                      سارا وکیلی
                      <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                    </h3>
                    <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                    <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="fa fa-bell-o"></i>
              <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
              <span class="dropdown-item dropdown-header">15 نوتیفیکیشن</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fa fa-envelope ml-2"></i> 4 پیام جدید
                <span class="float-left text-muted text-sm">3 دقیقه</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fa fa-users ml-2"></i> 8 درخواست دوستی
                <span class="float-left text-muted text-sm">12 ساعت</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fa fa-file ml-2"></i> 3 گزارش جدید
                <span class="float-left text-muted text-sm">2 روز</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a>
            </div>
          </li>
        </ul>
      </nav>
      <!-- /.navbar -->
    
      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="../../index3.html" class="brand-link">
          <span class="brand-text font-weight-light">پنل مدیریت</span>
        </a>
    
        <!-- Sidebar -->
        <div class="sidebar">
          <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              </div>
            </div>
    
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview {{ request()->is('admin') ? 'active_nav' : '' }}">
                  <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="nav-icon fa fa-dashboard"></i>
                    <p>
                      پیشخوان
                    </p>
                  </a>
                </li>

                <li class="nav-item has-treeview 
                {{ request()->is('admin/Posts') ? 'active_nav' : '' }}
                {{ request()->is('admin/create') ? 'active_nav' : '' }}
                {{ request()->is('admin/categorys') ? 'active_nav' : '' }}
                {{ request()->is('admin/tags') ? 'active_nav' : '' }}
                ">
                  <a href="#" class="nav-link">
                    <img src="{{ asset('/img/12.png') }}" style="opacity: 0.8" width="23" height="23">
                    <p class="m-1">
                      نوشته ها
                      <i class="fa fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item {{ request()->is('admin/Posts') ? 'active_nav' : '' }}">
                      <a href="{{ route('admin.posts') }}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>همه نوشته ها</p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/create') ? 'active_nav' : '' }}">
                      <a href="{{ route('admin.create.post') }}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>افزودن نوشته</p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/categorys') ? 'active_nav' : '' }}">
                      <a href="{{ route('admin.categories') }}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>دسته ها</p>
                      </a>
                    </li>
                    <li class="nav-item {{ request()->is('admin/tags') ? 'active_nav' : '' }}">
                      <a href="{{ route('admin.tags') }}" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>برچسب ها</p>
                      </a>
                    </li>
                  </ul>
                </li>
                
                <li class="nav-item {{ request()->is('admin/users') ? 'active_nav' : '' }}">
                  <a href="{{ route('admin.users') }}" class="nav-link">
                    <img src="{{ asset('/img/11.png') }}" style="opacity: 0.8" width="23" height="23">
                    <p class="m-1">
                      کاربران
                    </p>
                  </a>
                </li>
                <li class="nav-item {{ request()->is('admin/comments') ? 'active_nav' : '' }}">
                  <a href="{{ route('admin.comments') }}" class="nav-link">
                    <img src="{{ asset('/img/13.png') }}" style="opacity: 0.8" width="23" height="23">
                    <p class="m-1">
                      دیدگاه ها
                    </p>
                  </a>
                </li>
                <li class="nav-item {{ request()->is('admin/clender') ? 'active_nav' : '' }}">
                  <a href="{{ route('admin.clender') }}" class="nav-link">
                    <i class="nav-icon fa fa-calendar"></i>
                    <p>
                      تقویم
                    </p>
                  </a>
                </li>
                
                <li class="nav-item has-treeview">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-envelope-o"></i>
                    <p>
                      ایمیل‌ باکس
                      <i class="fa fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="../mailbox/mailbox.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>اینباکس</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../mailbox/compose.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>ایجاد</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="../mailbox/read-mail.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>خواندن</p>
                      </a>
                    </li>
                  </ul>
                </li>
    
                <li class="nav-header">متفاوت</li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-file"></i>
                    <p>مستندات</p>
                  </a>
                </li>
                {{-- <li class="nav-header">برچسب‌ها</li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-circle-o text-danger"></i>
                    <p class="text">مهم</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-circle-o text-warning"></i>
                    <p>هشدار</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-circle-o text-info"></i>
                    <p>اطلاعات</p>
                  </a>
                </li> --}}
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
        </div>
        <!-- /.sidebar -->
      </aside>
<!-- Site wrapper -->
@yield('main')

<footer class="main-footer">
  <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">امین فولادی</a>.</strong>
</footer>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>

<!-- jQuery -->
<script src="/back/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/back/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SlimScroll -->
<script src="/back/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/back/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/back/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/back/dist/js/demo.js"></script>

<script src="/back/js/script.js"></script>

<!-- CK Editor -->
<script src="/back/plugins/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/back/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    ClassicEditor
      .create(document.querySelector('#editor1'))
      .then(function (editor) {
        // The editor instance
      })
      .catch(function (error) {
        console.error(error)
      })

    // bootstrap WYSIHTML5 - text editor

      $('.textarea').wysihtml5({
          toolbar: { fa: true }
      })
  })
</script>

{{-- chosen --}}
<script src="{{ asset('plugins/chosen/chosen.jquery.js') }}"></script>
<script>
  $(".chosen-select").chosen()
</script>
<script>
  {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!};
        var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
        $('#lfm').filemanager('image', {prefix: route_prefix});
</script>
</body>
</html>
