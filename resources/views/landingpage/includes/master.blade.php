<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="icon" type="image/x-icon" href="{{asset('front/assets/favicon.ico')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Almarai&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="{{asset('front/styles/main.css')}}" rel="stylesheet"/>
  <link href="{{asset('front/styles/rtl.css')}}" rel="stylesheet" />
</head>

<body>
  <!-- loader  -->
  <!-- <div class="loader" id="loader_bg"><img src="./assets/loading.gif" alt="#" /></div> -->
  <!-- end loader -->
  <div class="landing">
    <div class="container">

      <!-- --------------------------------------- Header ---------------------------------------- -->
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
            <a class="navbar-brand" href="{{asset('/')}}">
{{--                <img src="{{asset('front/assets/logo1.svg')}}" alt="logo" width="100px" height="50px">--}}
                <img src="{{asset('assets\img\idevLogo.webp')}}" width="150" class="navbar-brand-img auth-logo" alt="logo">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="{{asset('/')}}">الرئيسية</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/about')}}">حولنا</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/solutions')}}">الحلول</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{asset('/pricing')}}">الأسعار</a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Language
                    </a>
                    <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">ENGLISH</a></li>
                    <li><a class="dropdown-item" href="#">العــربـيــة</a></li>
                    </ul>
                </li> -->
                </ul>
            </div>
            </div>
        </nav>
      <!-- --------------------------------------- /Header ---------------------------------------- -->


    <!-- --------------------------------------- Landing ------------------------------------------>
        <div class="row">
            <div class="landing-info col-md-12 col-12 text-center">
                <h1>تبسيط إدارة الموارد البشرية .</h1>
                <p> كل ما تحتاجه لإدارة الموارد البشرية في السعودية! </p>
                <a  href="{{asset('login')}}" class="btn-more">جربه الآن</a>
            </div>
        </div>
    <!-- --------------------------------------- /Landing ------------------------------------------>
    </div>
  </div>

    @yield('content')

  <!-- --------------------------------------- Footer ---------------------------------------- -->
    <footer class="footer pt-4 border-top">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md text-center">
{{--                    <img class="mb-2 " src="{{asset('front/assets/badia-light.png')}}" alt="" width="150px" height="75px">--}}
{{--                    <img src="{{asset('assets\img\idevLogofooter.jpg')}}" width="150" class="navbar-brand-img auth-logo" alt="logo">--}}

                    <p class="d-block mb-3 text-center">تبسيط إدارة الموارد البشرية .
                        كل ما تحتاجه لإدارة الموارد البشرية في السعودية!</p>
                </div>

                <div class="col-6 col-md links-footer">
                    <h5>صفحات اخرى</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="links" href="#">الأحكام والشروط</a></li>
                        <li><a class="links" href="#">سياسة الخصوصية</a></li>
                        <li><a class="links" href="#"> برنامج إدارة الموارد البشرية</a></li>

                    </ul>
                </div>

                <div class="col-6 col-md links-footer">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled text-small">
                        <li><a class="links" href="{{asset('/')}}">الرئيسية</a></li>
                        <li><a class="links" href="{{asset('/login')}}">دخول</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            جميع حقوق النشر محفوظة لباديا © 2022.
        </div>
    </footer>
  <!-- --------------------------------------- /Footer ---------------------------------------- -->
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="{{asset('front/js/main.js')}}"></script>
</html>
