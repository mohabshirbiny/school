<html lang="ar" dir="rtl">
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>تسجيل الدخول</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="shortcut icon" href="/themes/researcher/assets/img/favicon.png" type="image/x-icon" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Cairo:200,300,400,600,700,900&display=swap&subset=arabic" rel="stylesheet">
    <link href="/themes/researcher/assets/css/font/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="/themes/researcher/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="/themes/researcher/assets/css/date/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/themes/researcher/assets/css/sweetalert.css" rel="stylesheet" type="text/css" />
    <link href="/themes/researcher/assets/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/themes/researcher/assets/css/hover-min.css" rel="stylesheet" type="text/css" />
</head>
<style>
    body{position: relative;height: 100vh;background: #32c5d2 url(/themes/researcher/assets/img/welcome_img.png) no-repeat center center fixed;background-size: cover;}
</style>
<!-- END HEAD -->
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto col-sm-12">
            <div class="login">
                <!-- BEGIN LOGO -->
                <div class="logo">
                </div>
                <!-- END LOGO -->
                <!-- BEGIN LOGIN -->
                <div class="content">
                    <!-- BEGIN LOGIN FORM -->
                    <form class="login-form" action="{{ route('login') }}" method="post">
                        @csrf
                        <h3 class="form-title">تسجيل الدخول الى حسابك</h3>
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span> الرجاء ادخال اسم المستخدم وكلمة المرور </span>
                        </div>
                        <div class="form-group">
                            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                            <label class="control-label visible-ie8 visible-ie9">البريد الإلكتروني</label>
                            <div class="input-icon">
                                <i class="fa fa-user"></i>
                                <input class="form-control placeholder-no-fix" type="text" placeholder="البريد الإلكتروني" name="email" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
                            <div class="input-icon">
                                <i class="fa fa-lock"></i>
                                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمة المرور" name="password" /> </div>
                        </div>
                        <div class="form-actions">
                            <label class="rememberme mt-checkbox mt-checkbox-outline">
                                <input type="checkbox" name="remember" value="1" /> تذكرني
                                <span></span>
                            </label>
                            <button type="submit" class="btn green pull-right"> تسجيل الدخول </button>
                        </div>
                        <div class="forget-password">
                            <h4>هل نسيت كلمة السر ؟</h4>
                            <p> لإعادة كلمة السر إضغط <a href="javascript:;" id="forget-password">هنا </a></p>
                        </div>
                    </form>
                    <!-- END LOGIN FORM -->
                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <form class="forget-form" action="index.html" method="post">
                        <h3>إعادة كلمة السر</h3>
                        <p> أدخل عنوان بريدك الإلكتروني لإعادة تعيين كلمة المرور الخاصة بك. </p>
                        <div class="form-group">
                            <div class="input-icon">
                                <i class="fa fa-envelope"></i>
                                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="البريد الإلكتروني" name="email" /> </div>
                        </div>
                        <div class="form-actions">
                            <button type="button" id="back-btn" class="btn grey-salsa btn-outline"> رجوع </button>
                            <button type="submit" class="btn green pull-right"> إرسال </button>
                        </div>
                    </form>
                    <!-- END FORGOT PASSWORD FORM -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END LOGIN -->
<!--[if lt IE 9]>
<script src="/themes/researcher/assets/js/respond.min.js"></script>
<script src="/themes/researcher/assets/js/excanvas.min.js"></script>
<script src="/themes/researcher/assets/js/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="/themes/researcher/assets/js/jquery.min.js" type="text/javascript"></script>
<script src="/themes/researcher/assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/themes/researcher/assets/js/date/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/themes/researcher/assets/js/repeater/repeater.js" type="text/javascript"></script>
<script src="/themes/researcher/assets/js/app.min.js" type="text/javascript"></script>
<!-- END SCRIPTS -->
</body>
</html>

