
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Mwerdi</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{asset('public/front/assets/img/logo.png')}}" rel="icon">
    <link href="{{asset('public/front/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    @if(app()->getLocale() == 'ar')
        <!-- Cairo for Arabic -->
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @else
        <!-- Original fonts for other languages -->
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @endif
    <!-- Vendor CSS Files -->
    <link href="{{asset('public/front/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/front/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('public/front/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('public/front/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/front/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{asset('public/front/assets/css/main.css')}}" rel="stylesheet">
<style>
    body {
        font-family:
            @if(app()->getLocale() == 'ar')
            'Cairo', sans-serif;
    @else
'Open Sans', 'Poppins', 'Raleway', sans-serif;
    @endif
}

    /* If you need to target specific elements */
    body:lang(ar) {
        font-family: 'Cairo', sans-serif;
    }

    /* For elements that should always use Cairo when in Arabic */
    @if(app()->getLocale() == 'ar')
    .arabic-text {
        font-family: 'Cairo', sans-serif;
    }
    @endif
/* Language Dropdown Container */
    .language-dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Toggle Button */
    .dropdown-toggle {
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        display: flex;
        align-items: center;
    }

    .dropdown-toggle i {
        color: #ffc107; /* Yellow color for the globe icon */
        font-size: 1.5rem; /* Increased icon size */
    }

    /* Dropdown Menu */
    .dropdown-menu {
        display: none; /* Hidden by default */
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.15);
        border-radius: 4px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        width: 120px;
        padding: 0;
        margin-top: 5px;
        z-index: 1000;
    }

    .dropdown-menu.show {
        display: block; /* Show dropdown when toggled */
    }

    /* Dropdown Items */
    .dropdown-item {
        padding: 8px 16px;
        font-size: 14px;
        color: #333;
        text-decoration: none;
        display: block;
        transition: background-color 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa; /* Light gray background on hover */
    }

    .dropdown-item.text-danger {
        color: #dc3545 !important; /* Red color for the active language */
    }

    /* Divider */
    .dropdown-divider {
        margin: 4px 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }
    .current-language {
        margin-left: 8px;
        font-size: 14px;
        color: #fff;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* Flag styling */
    .current-language::before {
         font-size: 16px;
    }

    .dropdown-item {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Optional: Add hover animation */
    .dropdown-toggle:hover .current-language {
        transform: translateX(2px);
        transition: transform 0.2s ease;
    }

</style>
</head>

<body class="index-page">

<header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
        <!-- Language Dropdown Section -->
        <div class="language-dropdown">
            <!-- Dropdown Toggle Button -->
            <button class="dropdown-toggle" id="languageDropdown">
                <i class="fa text-white fa-globe text-warning fa-lg"></i>
                <span class="current-language">
            @if(app()->getLocale() == 'en')
                        English
                    @else
                        عربي
                    @endif
        </span>
            </button>

            <!-- Dropdown Menu -->
            <ul class="dropdown-menu" id="dropdownMenu">
                <!-- English Option -->
                <li>
                    <a class="dropdown-item @if(app()->getLocale() == 'en') text-danger @endif"
                       href="{{ route('change.language', 'en') }}">
                        En
                    </a>
                </li>

                <!-- Arabic Option -->
                <li>
                    <a class="dropdown-item @if(app()->getLocale() == 'ar') text-danger @endif"
                       href="{{ route('change.language', 'ar') }}">
                        ع
                    </a>
                </li>
            </ul>
        </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{route('landingPage')}}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                  <img src="{{asset('public/front/assets/img/logo.png')}}" alt="">
                <h4 class="sitename">Mwerdi</h4>
            </a>

            <nav id="navmenu" class="navmenu" @if(app()->getLocale()=='ar') dir="rtl" @endif>
                <ul>
                    <li><a href="#hero" class="active">{{__('Home')}}</a></li>
                    <li><a href="#about">{{__('About')}}</a></li>
                    <li><a href="#services">Services</a></li>

                    <li><a href="#team">Team</a></li>

                    <li><a href="#contact">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>

    </div>

</header>

<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('storage/app/public/'.$homeSection->image) }}" alt="" data-aos="fade-in">
        @if(app()->getLocale()=='ar')
        <div class="container" data-aos="fade-up" data-aos-delay="100" dir="rtl">
            <div class="row justify-content-start">
                <div class="col-lg-8">
                    <h2>{{$homeSection->title_ar}}</h2>
                    <p>{{$homeSection->description_ar}}</p>
                    <a href="#about" class="btn-get-started">{{__('Get Started')}}</a>
                </div>
            </div>
        </div>
        @else
            <div class="container" data-aos="fade-up" data-aos-delay="100" dir="rtl">
                <div class="row justify-content-start">
                    <div class="col-lg-8">
                        <h2>{{$homeSection->title}}</h2>
                        <p>{{$homeSection->description}}</p>
                        <a href="#about" class="btn-get-started">{{__('Get Started')}}</a>
                    </div>
                </div>
            </div>
        @endif

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
        @if(app()->getLocale()=='ar')
        <!-- Section Title -->
        <div class="container section-title" dir="rtl" data-aos="fade-up">
            <span>معلومات عنا<br></span>
            <h2>معلومات عنا<br></h2>

            <p>{{$about->title_ar}}</p>
        </div><!-- End Section Title -->
        <div class="container" dir="rtl">

            <div class="row gy-4">



                <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    {!! $about->description_ar !!}                </div>

            </div>

        </div>
        @else
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <span>About Us<br></span>
                <h2>About Us<br></h2>

                <p>{!! $about->title !!}</p>
            </div><!-- End Section Title -->
            <div class="container">

                <div class="row gy-4">

{{--                    <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">--}}
{{--                        <img src="assets/img/about.jpg" class="img-fluid" alt="">--}}
{{--                    </div>--}}

                    <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
                    {!! $about->description !!}
                     </div>

                </div>

            </div>
        @endif

    </section><!-- /About Section -->


    <!-- Clients Section -->
    <section id="clients" class="clients section light-background">

        <div class="container">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
                    {
                      "loop": true,
                      "speed": 600,
                      "autoplay": {
                        "delay": 5000
                      },
                      "slidesPerView": "auto",
                      "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                      },
                      "breakpoints": {
                        "320": {
                          "slidesPerView": 2,
                          "spaceBetween": 40
                        },
                        "480": {
                          "slidesPerView": 3,
                          "spaceBetween": 60
                        },
                        "640": {
                          "slidesPerView": 4,
                          "spaceBetween": 80
                        },
                        "992": {
                          "slidesPerView": 6,
                          "spaceBetween": 120
                        }
                      }
                    }
                </script>
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="{{asset('public/front/assets/img/clients/client-1.png')}}" class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('public/front/assets/img/clients/client-1.png')}} " class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('public/front/assets/img/clients/client-1.png')}} " class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('public/front/assets/img/clients/client-1.png')}} " class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('public/front/assets/img/clients/client-1.png')}} " class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('public/front/assets/img/clients/client-1.png')}} " class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('public/front/assets/img/clients/client-1.png')}} " class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{asset('public/front/assets/img/clients/client-1.png')}} " class="img-fluid" alt=""></div>
                </div>
            </div>

        </div>

    </section><!-- /Clients Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Services</span>
            <h2>Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                        <div class="icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Nesciunt Mete</h3>
                        </a>
                        <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Eosle Commodi</h3>
                        </a>
                        <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-easel"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Ledo Markt</h3>
                        </a>
                        <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-bounding-box-circles"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Asperiores Commodit</h3>
                        </a>
                        <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-calendar4-week"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Velit Doloremque</h3>
                        </a>
                        <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="bi bi-chat-square-text"></i>
                        </div>
                        <a href="#" class="stretched-link">
                            <h3>Dolori Architecto</h3>
                        </a>
                        <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
                        <a href="#" class="stretched-link"></a>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

        <img src="assets/img/cta-bg.jpg" alt="">

        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3>Call To Action</h3>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <a class="cta-btn" href="#">Call To Action</a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Call To Action Section -->

   
    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Pricing</span>
            <h2>Pricing</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row g-4 g-lg-0">

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-item">
                        <h3>Free Plan</h3>
                        <h4><sup>$</sup>0<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                            <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4 featured" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-item">
                        <h3>Business Plan</h3>
                        <h4><sup>$</sup>29<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                            <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                            <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-item">
                        <h3>Developer Plan</h3>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                            <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                            <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                            <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                            <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                            <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
                        </ul>
                        <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
                    </div>
                </div><!-- End Pricing Item -->

            </div>

        </div>

    </section><!-- /Pricing Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Team</span>
            <h2>Team</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>Walter White</h4>
                            <span>Web Development</span>
                            <p>
                                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui aut aut aut
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>Sarah Jhinson</h4>
                            <span>Marketing</span>
                            <p>
                                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4>William Anderson</h4>
                            <span>Content</span>
                            <p>
                                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
                            </p>
                            <div class="social">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Team Member -->

            </div>

        </div>

    </section><!-- /Team Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>Contact</span>
            <h2>Contact</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>A108 Adam Street, New York, NY 535022</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Call Us</h3>
                        <p>+1 5589 55488 55</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Us</h3>
                        <p>info@example.com</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="col-lg-6">
                    <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit">Send Message</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

</main>

<footer id="footer" class="footer position-relative dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-about">
                    <a href="index.html" class="logo sitename">Day</a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">{{__('Home')}}</a></li>
                    <li><a href="#">{{__('About us')}}</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Terms of service</a></li>
                    <li><a href="#">Privacy policy</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Web Design</a></li>
                    <li><a href="#">Web Development</a></li>
                    <li><a href="#">Product Management</a></li>
                    <li><a href="#">Marketing</a></li>
                    <li><a href="#">Graphic Design</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action="forms/newsletter.php" method="post" class="php-email-form">
                    <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                </form>
            </div>

        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Day</strong> <span>All Rights Reserved</span></p>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{asset('public/front/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/front/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('public/front/assets/vendor/aos/aos.js')}}"></script>
<script src="{{asset('public/front/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('public/front/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('public/front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('public/front/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>

<!-- Main JS File -->
<script src="{{asset('public/front/assets/js/main.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dropdownToggle = document.getElementById('languageDropdown');
        const dropdownMenu = document.getElementById('dropdownMenu');

        // Toggle dropdown on button click
        dropdownToggle.addEventListener('click', function (e) {
            e.preventDefault();
            dropdownMenu.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function (e) {
            if (!dropdownToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>
</body>

</html>
