<html lang="ar" dir="rtl">
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="shortcut icon" href="{{ asset('themes/researcher/assets/img/favicon.png') }}" type="image/x-icon" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap&subset=arabic" rel="stylesheet">
    <link href="/themes/researcher/assets/css/font/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/themes/researcher/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="/themes/researcher/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css" integrity="sha256-aa0xaJgmK/X74WM224KMQeNQC2xYKwlAt08oZqjeF0E=" crossorigin="anonymous" />
        
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<div class="page-header navbar">

    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
                <img src="/themes/researcher/assets/img/c_m_logo.png" alt="logo-mu" class="logo-default " /> </a>
            <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
        </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN PAGE TOP -->
    <div class="page-top">
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                <li class="dropdown dropdown-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <span class="username username-hide-on-mobile"> مرحبا بك :  </span>
                    </a>
                </li>
                <!-- END USER LOGIN DROPDOWN -->
                <!-- BEGIN LANGUAGE AR US -->
                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

                <a href="#" style="background-color: none;  padding-left: 20px"><img alt="" src="/themes/researcher/assets/img/logo_mu.png" alt="logo_mu"></a>
                <a href="#" style="background-color: none;"><img alt="" src="/themes/researcher/assets/img/vision-2030-gray.png" alt="vision2030"></a>
                </li>
                <!-- END LANGUAGE AR US -->
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END PAGE TOP -->
</div>
<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="container">
    <div class="row">


        @if(Session::has('message'))
            <div class="page-bar shadow-mo">
                <div class="alert alert-{{ Session::get('class') }}">
                    <span>{{ Session::get('message') }}</span>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="page-bar shadow-mo">
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger"><span>{{$error}}</span></div>
                @endforeach
            </div>
    @endif


    @yield('content')


    <!-- END SAMPLE FORM PORTLET-->
    </div>
</div>
<br>
<br>
<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer">تطوير عمادة تقنية المعلومات
        <a target="_blank" href="https://www.mu.edu.sa/" >بجامعة المجمعة</a> &copy; {{ Date('Y') }}
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
</div>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="/themes/researcher/assets/js/respond.min.js"></script>
<script src="/themes/researcher/assets/js/excanvas.min.js"></script>
<script src="/themes/researcher/assets/js/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('themes/researcher/assets/js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('themes/researcher/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('themes/researcher/assets/js/app.min.js') }}" type="text/javascript"></script>
<!-- END SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@yield('script')

</body>



</html>


