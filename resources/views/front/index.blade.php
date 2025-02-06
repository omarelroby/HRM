
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
    <!-- Bootstrap CSS (Already included in most themes) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="{{asset('public/front/assets/css/main.css')}}" rel="stylesheet">
    <style>
        /* General Reset */


        /* Body Styling */

        /* Form Container */
        .form-container {
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px;
            text-align: center;
        }

        /* Form Title */
        .form-container h2 {
            margin-bottom: 1.5rem;
            color: #333;
            font-size: 1.5rem;
        }

        /* Form Group */
        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }

        /* Labels */
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
            font-size: 0.9rem;
        }

        /* Input Fields */
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        /* Input Focus Effect */
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0, 123, 255, 0.25);
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 0.8rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Hover Effect for Button */
        .submit-btn:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .form-container {
                padding: 1.5rem;
            }

            .form-container h2 {
                font-size: 1.25rem;
                    }
        }
    </style>
<style>
        /* Modal background */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);

            align-items: center;
            justify-content: center;
        }

        /* Modal content */
        .modal-content {
            background: white;
            padding: 20px;
            width: auto;

            text-align: center;
            position: relative;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }

        /* Close button */
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }

        /* Button */
        button {
            padding: 10px 20px;
            border: none;
            background: #007BFF;
            color: white;
            font-size: 16px;

            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }
</style>
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
    h1, h2, h3, h4, h5, h6,
    span {
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



    /* Dropdown Menu */
    .dropdown-menu {
        display: none; /* Hidden by default */
        position: absolute;
        top: 100%;
        right: 0;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.15);

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
    .client-card {
        position: relative;
        width: 150px; /* Equal width */
        height: 150px; /* Equal height */
        overflow: hidden;
        border-radius: 10px;
    }

    /* Parent Container */
    .client-container {
        width: 150px; /* Set a fixed width or use max-width */
        height: auto;
        text-align: center;
    }

    /* Background Image */
    .client-image {
        width: 100%;
        height: 150px; /* Equal height */
        background-size: cover;
        background-position: center;
        opacity: 1;
        border-radius: 10px;
    }

    /* Client Name Under Image */
    .client-name {
        width: 100%; /* Matches the image width */
        text-align: center;
        font-weight: bold;
        font-size: 16px;
        color: rgba(0, 0, 0, 0.7);;

        padding: 8px;
        border-radius: 0 0 10px 10px; /* Rounded bottom corners */
    }
    .icon {
        text-align: center; /* Center the icon */
        margin-bottom: 1rem; /* Add some space below the icon */
    }
    .icon-img {
        width: 50px; /* Adjust size as needed */
        height: 50px; /* Adjust size as needed */
        object-fit: contain; /* Ensures the image fits within the dimensions */
        display: block; /* Ensures the image is treated as a block element */
        margin: 0 auto; /* Centers the image horizontally */
    }
</style>

</head>

<body class="index-page">

<header id="header" class="header fixed-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">{{$setting->email}}</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{$setting->phone}}</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="{{$setting->twitter}}" target="_blank" class="twitter"><i class="bi bi-twitter-x"></i></a>
                <a href="{{$setting->facebook}}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="{{$setting->instagram}}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="{{$setting->linkedin}}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>

        <div class="d-flex align-items-center">
             <div class="language-dropdown me-3">
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
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li>
                        <a class="dropdown-item @if(app()->getLocale() == 'en') text-danger @endif"
                           href="{{ route('change.language', 'en') }}">
                            En
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item @if(app()->getLocale() == 'ar') text-danger @endif"
                           href="{{ route('change.language', 'ar') }}">
                            ع
                        </a>
                    </li>
                </ul>

            </div>

        </div>
        <a href="{{ route('login') }}" class="text-dark px-3 py-2 d-flex align-items-center mx-5" style="background-color: white; border-radius: 5px;">
            <i class="bi bi-box-arrow-in-right me-2"></i> Login
        </a>
    </div>

    <div class="branding d-flex align-items-center">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{route('landingPage')}}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                  <img src="{{asset('public/front/assets/img/logo.png')}}" alt="">
                <h4 class="sitename">Mwerdi</h4>
            </a>

            <nav id="navmenu" class="navmenu" @if(app()->getLocale()=='ar') dir="rtl" @endif>
                <ul>
                    <li><a href="#hero" class="active"><span>{{__('Home')}}</span></a></li>
                    <li><a href="#about"><span>{{__('About')}}</span></a></li>
                    <li><a href="#services"><span> {{__('Features')}}</span></a></li>
                    <li><a href="#team"><span>{{__('Why Choose Us')}}</span></a></li>

                    <li><a href="#contact"><span>{{__('Contact Us')}}</span></a></li>
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
                <div class="col-lg-12">
                    <h2>{{$homeSection->title_ar}}</h2>
                    <p>{{$homeSection->description_ar}}</p>
                    <a href="#about" class="btn-get-started">{{__('Get Started')}}</a>
                </div>
            </div>
        </div>
        @else
            <div class="container" data-aos="fade-up" data-aos-delay="100" dir="rtl">
                <div class="row justify-content-start">
                    <div class="col-lg-12">
                        <h2>{{$homeSection->title}}</h2>
                        <p>{{$homeSection->description}}</p>
                        <a href="#about" class="btn-get-started">{{__('Get Started')}}</a>
                    </div>
                </div>
            </div>
        @endif

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section ">
        @if(app()->getLocale()=='ar')
        <!-- Section Title -->
        <div class="container section-title" dir="rtl" data-aos="fade-up">
            <span>معلومات عنا<br></span>
            <h2>معلومات عنا<br></h2>

            <p>{{$about->title_ar}}</p>
        </div><!-- End Section Title -->
        <div class="container" dir="rtl">
            <div class="row">
                <div class="col-lg-12 order-2 order-lg-1 content  " data-aos="fade-up" data-aos-delay="200">
                    {!! $about->description_ar !!}
                </div>

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

                    <div class="col-lg-12 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200">
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
                    @foreach($clients as $client)
                        <div class="swiper-slide">
                            <div class="client-container">
                                <div class="client-image" style="background-image: url('{{ asset('storage/app/public/'.$client->image) }}');"></div>
                                @if(app()->getLocale()=='ar')
                                <div class="client-name">{{ $client->name_ar??'' }}</div>
                                @else
                                <div class="client-name">{{ $client->name??'' }}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container section-title" data-aos="fade-up">
            <span>{{__('Features')}}</span>
            <h2>{{__('Features')}}</h2>
         </div>

        <div class="container">
            <div class="row gy-4">
                @if(app()->getLocale() == 'en')
                    @foreach($features as $feature)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <img src="{{ asset('storage/app/public/' . ($feature->icon ?? 'default-icon.png')) }}" alt="{{ $feature->title }}" class="icon-img">
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>{{ $feature->title }}</h3>
                                </a>
                                <p>{{ $feature->description }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    @foreach($features as $feature)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-item position-relative">
                                <div class="icon">
                                    <img src="{{ asset('storage/app/public/' . ($feature->icon ?? 'default-icon.png')) }}" alt="{{ $feature->title_ar }}" class="icon-img">
                                </div>
                                <a href="#" class="stretched-link">
                                    <h3>{{ $feature->title_ar }}</h3>
                                </a>
                                <p>{{ $feature->description_ar }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>    </section><!-- /Services Section -->

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

        <img src="assets/img/cta-bg.jpg" alt="">

        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3>{{__('Contact Us')}}</h3>
                        @if(app()->getLocale()=='ar')
                        <p>{{$homeSection->description_ar ??''}}</p>
                        @else
                            <p>{{$homeSection->description??''}}</p>

                        @endif

                        <a class="cta-btn" href="#contact">{{__('Contact Us')}}</a>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Call To Action Section -->


    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>{{__('Pricing')}}</span>
            <h2>{{__('Pricing')}}</h2>
{{--            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>--}}
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row g-4 g-lg-0">
                @foreach($plans as $plan)
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 100 + 100 }}">
                        <div class="pricing-item card shadow-sm border-0">
                            <div class="card-header text-white position-relative" style="background-color: {{ ['#f27439', '#24314e', '#ffa508'][$loop->index % 3] }};">
                                <h3 class="card-title mb-0 text-center text-white">{{ $plan->name }}</h3>
                            </div>

                            <div class="card-body">
                                <div class="text-center mb-4">
                                    <h4 class="display-4 font-weight-bold text-primary">
                                        <sup>{{ env('CURRENCY_SYMBOL', '$') }}</sup>{{ $plan->price }}
                                        <span class="text-muted">/ {{ __('month') }}</span>
                                    </h4>
                                </div>

                                <ul class="list-unstyled">
                                    <li class="{{ $plan->max_employees ? '' : 'na' }} mb-3">
                                        <i class="bi bi-{{ $plan->max_employees ? 'check' : 'x' }}"></i>
                                        <span>{{ $plan->max_users == -1 ? __('Unlimited') : $plan->max_users }}</span>&nbsp;&nbsp;
                                        <span>{{ __('Users') }}</span>
                                    </li>
                                    <li class="{{ $plan->max_employees ? '' : 'na' }} mb-3">
                                        <i class="bi bi-{{ $plan->max_employees ? 'check' : 'x' }}"></i>
                                        <span>{{ $plan->max_employees == -1 ? __('Unlimited') : $plan->max_employees }}</span>&nbsp;&nbsp;
                                        <span>{{ __('Employees') }}</span>
                                    </li>

                                    <!-- Chat GPT -->
                                    <li class="{{ $plan->chat_gpt ? '' : 'na' }} mb-3">
                                        <i class="bi bi-{{ $plan->chat_gpt ? 'check' : 'x' }}"></i>
                                        <span>{{ $plan->chat_gpt ? __('Enabled') : __('Disabled') }}</span>&nbsp;&nbsp;
                                        <span>{{ __('chat-gpt') }}</span>
                                    </li>

                                    <!-- Storage -->
                                    @if($plan->storage)
                                        <li class="mb-3">
                                            <i class="bi bi-check"></i>
                                            <span>{{ $plan->storage }} GB</span>&nbsp;&nbsp;
                                            <span>{{ __('storage') }}</span>
                                        </li>
                                    @else
                                        <li class="na mb-3">
                                            <i class="bi bi-x"></i>
                                            <span>{{ __('Disabled') }}</span>&nbsp;&nbsp;
                                            <span>{{ __('storage') }}</span>
                                        </li>
                                    @endif
                                </ul>

                                <div class="text-center mt-4">
                                    @if($plan->price > 0)

                                        <a href="javascript:void(0);"
                                           class="btn btn-outline-primary openModalBtn"
                                           data-plan-id="{{ $plan->id }}">
                                            {{ __('Subscribe') }}
                                        </a>



                                    @else
                                        <span class="btn btn-outline-success btn-block">
                                    <i class="fas fa-gift mr-1"></i>{{__('Free')}}
                                </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div id="modal" class="modal" style="display: none">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <div class="form-container">
                        <h2>{{ __('Plan Request') }}</h2>

                        <form id="planForm" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                                @csrf
                                <input type="hidden" name="plan_id" id="plan_id">

                                <div class="form-group">
                                <label for="name">{{__('name')}}</label>
                                <input type="text" id="name" name="name" placeholder="{{__('Enter your full name')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('email')}}</label>
                                <input type="email" id="email" name="email" placeholder="{{__('Enter your email')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">{{__('phone')}}</label>
                                <input type="text" id="phone" name="phone" placeholder="{{__('Enter your Phone')}}" required>
                            </div>
                            <div class="form-group">
                                <label for="buisness_type">{{__('Business Type')}}</label>
                                <input type="text" id="buisness_type" name="buisness_type" placeholder="{{__('Business Type')}}"   required>
                            </div>
                            <button type="submit" class="submit-btn">{{__('Send')}}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!-- Bootstrap Modal -->


    </section>

    <section id="team" class="call-to-action section dark-background">

        <img src="assets/img/cta-bg.jpg" alt="">

        <div class="container">
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-xl-10">
                    <div class="text-center">
                        <h3 class="my-8">{{__('Why Choose Us')}}</h3>
                        @if(app()->getLocale()=='ar')
                            @foreach($why as $w)
                                <p>{{ $w->title_ar ?? '' }}
                                    <i class="bi bi-check-circle-fill text-success ms-2" style="font-size: 1.2rem;"></i>
                                </p>
                            @endforeach
                        @else
                            @foreach($why as $w)
                                <p>{{ $w->title ?? '' }}
                                    <i class="bi bi-check-circle-fill text-success ms-2" style="font-size: 1.2rem;"></i>
                                </p>
                             @endforeach
                        @endif

                     </div>
                </div>
            </div>
        </div>

    </section><!-- /Call To Action Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <span>{{__('Contact Us')}}</span>
            <h2>{{__('Contact Us')}}</h2>

        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <p>{{$setting->address??''}}</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone"></i>
                        <h3>Call Us</h3>
                        <p>{{$setting->phone??''}}</p>
                    </div>
                </div><!-- End Info Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope"></i>
                        <h3>Email Us</h3>
                        <p>{{$setting->email??''}}</p>
                    </div>
                </div><!-- End Info Item -->

            </div>

            <div class="row gy-4 mt-1">
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    @if(!empty($setting->map))
                        {!! $setting->map !!}
                    @else
                        <p>No map available.</p>
                    @endif
                </div><!-- End Google Maps -->


                <div class="col-lg-6">
                    <form action="{{ route('contact-us.store') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="loading" style="display: none;">Loading...</div>
                                 <div class="sent-message" style="display: none;">Your message has been sent. Thank you!</div>
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </section>

</main>

<footer id="footer" class="footer position-relative dark-background">

    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-10 col-md-6">
                <div class="footer-about">
                    <a href="index.html" class="logo sitename">Mwerdi</a>
                    <div class="footer-contact pt-3">
                        {{$setting->address??''}}
                        <p class="mt-3"><strong>Phone:</strong> <span>{{$setting->phone??''}}</span></p>
                        <p><strong>Email:</strong> <span> {{$setting->email??''}} </span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="{{$setting->twitter }}" target="_blank"><i class="bi bi-twitter-x"></i></a>
                        <a href="{{$setting->facebook }}" target="_blank"><i class="bi bi-facebook"></i></a>
                        <a href="{{$setting->instagram }}" target="_blank"><i class="bi bi-instagram"></i></a>
                        <a href="{{$setting->linkedin }}" target="_blank"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-3 footer-links text-center">
                <h4>{{ __('Our Web Site') }}</h4>
                <ul class="list-unstyled d-inline-block text-start">
                    <li class="text-center"><a href="#hero">{{ __('Home') }}</a></li>
                    <li class="text-center"><a href="#about">{{ __('About Us') }}</a></li>
                    <li class="text-center"><a href="#services">{{ __('Features') }}</a></li>
                    <li class="text-center"><a href="#team">{{ __('Why Choose Us') }}</a></li>
                    <li class="text-center"><a href="#contact">{{ __('Contact Us') }}</a></li>
                </ul>
            </div>




        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p> <span>Copyright</span> <strong class="px-1 sitename">©</strong> <span>Mwerdi</span></p>

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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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


<script>
    $(document).ready(function () {
        const modal = $("#modal");
        const closeModalBtn = $(".close-btn");

        // Open modal when clicking Subscribe button
        $(document).on("click", ".openModalBtn", function () {
            let planId = $(this).data("plan-id");
            $("#plan_id").val(planId); // Set the plan_id in the form
            modal.show();
        });

        // Close modal when clicking the close button
        closeModalBtn.click(function () {
            modal.hide();
        });

        // Close modal when clicking outside the modal content
        $(window).click(function (event) {
            if ($(event.target).is(modal)) {
                modal.hide();
            }
        });

        // Handle form submission via AJAX
        $("#planForm").submit(function (e) {
            e.preventDefault();
            let form = $(this);
            let formData = form.serialize(); // Serialize form data

            $(".loading").show();
            $(".error-message").hide();
            $(".sent-message").hide();

            $.ajax({
                url: "{{ route('plan.request') }}", // Laravel route
                type: "POST",
                data: formData,
                success: function (response) {
                    $(".loading").hide();
                    $(".sent-message").show();
                    form[0].reset(); // Reset form fields
                    // Close modal after 9 seconds
                    setTimeout(() => {
                        modal.hide();
                    }, 9000);

                    // Reload page after 2 seconds
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                },
                error: function (xhr) {
                    $(".loading").hide();
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = "";
                    $.each(errors, function (key, value) {
                        errorMessage += value + "<br>";
                    });
                    $(".error-message").html(errorMessage).show();
                },
            });
        });
    });

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.php-email-form').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission

            // Show loading message
            $('.loading').show();
            $('.error-message').hide();
            $('.sent-message').hide();

            // Serialize form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function (response) {
                    // Hide loading message
                    $('.loading').hide();

                    if (response.success) {
                        // Show success message
                        $('.sent-message').show();
                    } else {
                        // Show error message
                        $('.error-message').html('An error occurred. Please try again.').show();
                    }
                    setTimeout(() => {
                        modal.hide();
                    }, 9000);

                    // Reload page after 2 seconds
                    setTimeout(() => {
                        window.location.reload();
                    }, 1500);
                },
                error: function (xhr) {
                    // Hide loading message
                    $('.loading').hide();

                    // Show error message
                    var errorMessage = 'An error occurred. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        errorMessage = '';
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            errorMessage += value + '<br>';
                        });
                    }
                    $('.error-message').html(errorMessage).show();
                }
            });
        });
    });
</script>
</body>

</html>
