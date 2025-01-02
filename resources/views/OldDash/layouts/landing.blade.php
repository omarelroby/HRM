<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

        <style>
            * {
                box-sizing: border-box;
            }

            html {
                height: 100%;
            }

            body {
                color: #fff;
                font: 300 1rem/1.5 Lato, sans-serif;
                margin: 0;
                min-height: 100%;
            }

            .align {
                align-items: center;
                display: flex;
                flex-direction: row;
            }

            .align__item--start {
                align-self: flex-start;
            }

            .align__item--end {
                align-self: flex-end;
            }

            .animation {
                animation-duration: 2s;
                animation-timing-function: ease-in-out;
            }

            .animation--infinite {
                animation-iteration-count: infinite;
            }

            .animation--up-down {
                animation-name: upDown;
            }

            @keyframes upDown {
                0% {
                    transform: translateY(-15px);
                }

                50% {
                    transform: translateY(0);
                }

                100% {
                    transform: translateY(-15px);
                }
            }

            .text--center {
                text-align: center;
            }

            .site__header {
                left: 0;
                padding: 3rem 0;
                position: fixed;
                top: 0;
                transform: translateZ(0);
                width: 100%;
                z-index: 10;
                transition: .5s;
                color: #fff;

            }

            


            .navbar-toggler {
                background: #fff
            }

            .site__header a {
                color: #fff !important;
            }



            .site__section {
                min-height: 100vh;
                position: relative;
            }


            .site__section--start {

                min-height: 100vh;
                background: #ccc;
                background: url(landing/images/our-solution-technology-hero.jpeg) no-repeat;
                background-size: cover;
                background-position-y: bottom;
                background-attachment: fixed;
            }

            .site__section--start:before {
                position: absolute;
                width: 100%;
                height: 100%;
                content: "";
                background-color: rgb(0 0 0 / 68%);
            }

            .button {
                display: inline-block;
                padding: 0.5rem 1rem;
            }

            .button--primary {
                background-color: #ce3d90;
            }

            .button--rounded {
                border-radius: 999px;
            }

            .button--scroll {
                bottom: 2rem;
                left: 50%;
                position: absolute;
                transform: translateX(-50%);
            }

            .grid {
                margin: 0 auto;
                max-width: 74rem;
                width: 90%;

            }

            .grid:before,
            .grid:after {
                content: " ";
                display: table;
            }

            .grid:after {
                clear: both;
            }

            h1 {
                font-size: 3rem;
                font-weight: 300;
                margin: 0 0 0.5rem;
                text-transform: uppercase;
            }

            svg {
                height: auto;
                max-width: 100%;
                vertical-align: middle;
            }

            a {
                color: #fff;
                text-decoration: none;
            }

            .navigation ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }

            .navigation a {
                display: block;
            }

            .navigation--inline>ul:before,
            .navigation--inline>ul:after {
                content: " ";
                display: table;
            }

            .navigation--inline>ul:after {
                clear: both;
            }

            .navigation--inline>ul {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .navigation--main {
                float: right;
                text-transform: uppercase;
            }

            .navigation--main>ul {
                margin: 0 -2rem;
            }

            .navigation--main>ul>li {
                margin: 0 2rem;
            }

            .navigation--main a {
                padding-top: 0.5rem;
                padding-bottom: 0.5rem;
            }

            .header_sc {
                background: #fff;
                padding: 10px;
                transition: .5s;
                z-index: 99;
                border-bottom: 1px solid #eee;
                box-shadow: 0px 1px 4px 0 rgb(0 0 0 / 5%);

            }


            .site__header a,
            .h1 {
                color: #fff
            }


            .header_ {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .timeline {
                position: relative;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                padding: 5rem;
                margin: 0 auto 1rem auto;
                overflow: hidden;
            }

            .timeline:after {
                content: "";
                position: absolute;
                top: 0;
                left: 50%;
                margin-left: -2px;
                border-right: 2px dashed #028353;
                height: 100%;
                display: block;
            }

            .timeline-row {
                padding-left: 50%;
                position: relative;
                margin-bottom: 30px;
            }

            .timeline-row .timeline-time {
                position: absolute;
                right: 50%;
                top: 15px;
                text-align: right;
                margin-right: 20px;
                color: #bcd0f7;
                font-size: 1.5rem;
            }

            .timeline-row .timeline-time small {
                display: block;
                font-size: 0.8rem;
            }

            .timeline-row .timeline-content {
                position: relative;
                padding: 20px 30px;
                background: #f9f9f9a8;
                box-shadow: 2px 4px 4px 2px rgb(0 0 0 / 5%);
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                text-align: center;
            }

            .timeline-row .timeline-content:after {
                content: "";
                position: absolute;
                top: 20px;
                height: 16px;
                width: 16px;
                background: #f9f9f9a8;
            }

            .timeline-row .timeline-content:before {
                content: "";
                position: absolute;
                top: 20px;
                right: -49px;
                width: 20px;
                height: 20px;
                -webkit-border-radius: 100px;
                -moz-border-radius: 100px;
                border-radius: 100px;
                z-index: 10;
                background: #ffffff;
                border: 2px dashed #028353;
            }

            .timeline-row .timeline-content h4 {
                margin: 0 0 20px 0;
                overflow: hidden;
                white-space: pre-wrap;
                text-overflow: ellipsis;
                line-height: 150%;
            }

            .timeline-row .timeline-content p {
                margin-bottom: 30px;
                line-height: 150%;
            }

            .timeline-row .timeline-content i {
                font-size: 1.2rem;
                line-height: 100%;
                padding: 15px;
                -webkit-border-radius: 100px;
                -moz-border-radius: 100px;
                border-radius: 100px;
                background: #028353;
                margin-bottom: 10px;
                display: inline-block;
            }

            .timeline-row .timeline-content .thumbs {
                margin-bottom: 20px;
                display: flex;
            }

            .timeline-row .timeline-content .thumbs img {
                margin: 5px;
                max-width: 60px;
            }

            .timeline-row .timeline-content .badge {
                color: #ffffff;
                background: linear-gradient(120deg, #00b5fd 0%, #0047b1 100%);
            }

            .timeline-row:nth-child(even) .timeline-content {
                margin-left: 40px;
                text-align: left;
            }

            .timeline-row:nth-child(even) .timeline-content:after {
                left: -8px;
                right: initial;
                border-bottom: 0;
                border-left: 0;
                transform: rotate(-135deg);
            }

            .timeline-row:nth-child(even) .timeline-content:before {
                left: -52px;
                right: initial;
            }

            .timeline-row:nth-child(odd) {
                padding-left: 0;
                padding-right: 50%;
            }

            .timeline-row:nth-child(odd) .timeline-time {
                right: auto;
                left: 50%;
                text-align: left;
                margin-right: 0;
                margin-left: 20px;
            }

            .timeline-row:nth-child(odd) .timeline-content {
                margin-right: 40px;
            }

            .timeline-row:nth-child(odd) .timeline-content:after {
                right: -8px;
                border-left: 0;
                border-bottom: 0;
                transform: rotate(45deg);
            }

            @media (max-width: 992px) {
                .timeline {
                    padding: 15px;
                }

                .timeline:after {
                    border: 0;
                }

                .timeline .timeline-row:nth-child(odd) {
                    padding: 0;
                }

                .timeline .timeline-row:nth-child(odd) .timeline-time {
                    position: relative;
                    top: 0;
                    left: 0;
                    margin: 0 0 10px 0;
                }

                .timeline .timeline-row:nth-child(odd) .timeline-content {
                    margin: 0;
                }

                .timeline .timeline-row:nth-child(odd) .timeline-content:before {
                    display: none;
                }

                .timeline .timeline-row:nth-child(odd) .timeline-content:after {
                    display: none;
                }

                .timeline .timeline-row:nth-child(even) {
                    padding: 0;
                }

                .timeline .timeline-row:nth-child(even) .timeline-time {
                    position: relative;
                    top: 0;
                    left: 0;
                    margin: 0 0 10px 0;
                    text-align: left;
                }

                .timeline .timeline-row:nth-child(even) .timeline-content {
                    margin: 0;
                }

                .timeline .timeline-row:nth-child(even) .timeline-content:before {
                    display: none;
                }

                .timeline .timeline-row:nth-child(even) .timeline-content:after {
                    display: none;
                }
            }

            .loginsub {
                width: 100px;
                text-align: center;

            }

            .header_item {
                margin: 0px 20px
            }

            .navbar-nav {
                align-items: center
            }
        </style>

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Almarai:wght@300;400&display=swap');


            * {
                margin: 0px;
                padding: 0px;
            }

            html {
                scroll-behavior: smooth;
            }



            body,
            .v-application {
                font-size: 14px;
                font-family: 'Almarai', sans-serif;
                color: #444;
            }

            ul {
                list-style-type: none;
            }

            ul,
            p {
                margin: 0px;
                padding: 0px;
                margin-bottom: 0px;
            }

            a,
            .v-application a {
                color: #444;
                text-decoration: none;
            }

            img {
                max-width: 100%;
            }


            .page {
                margin-top: 30px;
                margin-bottom: 30px;
            }

            .ser_sub .v-btn {
                margin-top: 50px;
                width: 254px;
                height: 50px;
                color: #fff;
                margin-bottom: 50px;

            }

            .elementor_row.left:lang(ar) {
                transform: rotateY(180deg);
            }

            .elementor_row.right:lang(ar) {
                transform: rotateY(0deg);
            }

            .elementor_row.left,
            .elementor_row.right {
                background: url(images/arrowImg.png) no-repeat;
                width: 554px;
                height: 170px;
                background-size: 100% 100%;
                margin: 40px auto;

            }

            .elementor_row.right {
                transform: rotateY(180deg);
            }

            .ser_des h3 {
                display: block;
                padding-top: 50px;
                font-size: 28px;
                line-height: 50px;
            }

            .ser_des p {
                line-height: 35px;
                max-width: 500px;
                margin: auto;
                margin-top: 40px;
            }

            .ser_des {
                margin-top: 50px;
            }

            .services_body {
                text-align: center;
            }

            /*  */
            .btn-more {
                text-align: center;
                margin-top: 30px;
                padding: 15px 60px;
                border-radius: 7px;
                border: 1px solid #31c88e2b;
                color: #31c88e;
                background-color: #ffffff47;
                font-weight: 600;
                width: 257px;
                transition: 1s;
                color: #fff;

            }

            .btn-more:hover {

                transition: 1s;
                background-color: #31c88e;
            }

            #serv {
                position: absolute;
                margin-top: -88px;
                width: 100%;
                z-index: -1;
            }

            .container_text {
                z-index: 2;
            }

            .header_item {
                color: #fff !important
            }


            .header_sc .header_item {

                color: #444 !important
            }

            @media (max-width:767px) {
                .site__header .navbar-nav {
                background: #464646;
                padding: 15px;
            }
            .header_sc .navbar-nav {
                background: #fff;
            }
                footer h5 {
                    margin-top: 30px;
                    text-align: center;
                    margin-bottom: 20px;
                }

                footer li.nav-item.mb-2 {
                    text-align: center;
                    margin-top: 11px;
                    background: #fafafa;
                    padding: 10px;
                }

                .footerlogo {
                    text-align: center
                }
            }
        </style>

        <script>
            window.onscroll = function () {
                var distanceScrolled = document.documentElement.scrollTop;
                if (distanceScrolled > 70) {
                    var d = document.getElementById("header").classList.add("header_sc");
                } else {
                    var d = document.getElementById("header").classList.remove("header_sc");
                }
            }
        </script>
    </head>

    <body>

        <header>
            <nav id="header" class="site__header navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="#"> <img src="{{asset('landing/images/logo.svg')}}" /></a>


                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>


                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup" style="justify-content: end;">
                        <div class="navbar-nav">
                            <a class="header_item nav-item nav-link active" href="#">مثال</span></a>
                            <a class="header_item nav-item nav-link" href="#">مثال</a>
                            <a class="header_item nav-item nav-link" href="#">مثال</a>
                            <a href="{{asset('login')}}" style="color: #fff;"
                                class="loginsub button button--primary button--rounded">دخول
                            </a>
                        </div>
                    </div>
                </div>

            </nav>
        </header>

        <main class="site__main">
            <section class="site__section site__section--start align text--center">
                <div class="container container_text">

                    <h1 class="h1">تبسيط إدارة الموارد البشرية</h1>
                    <p style="color: #fff;margin-top: 13px;">كل ما تحتاجه لإدارة الموارد البشرية في السعودية!
                    </p>

                    <a href="#serv" class="button--scroll animation animation--infinite animation--up-down"><svg
                            xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="-275 398.7 44.2 44.2">
                            <path fill="#fff"
                                d="M-275 420.8c0-12.2 9.9-22.1 22.1-22.1s22.1 9.9 22.1 22.1c0 12.2-9.9 22.1-22.1 22.1s-22.1-9.9-22.1-22.1zm42.7 0c0-11.4-9.2-20.6-20.6-20.6-11.4 0-20.6 9.2-20.6 20.6 0 11.4 9.2 20.6 20.6 20.6 11.4 0 20.6-9.3 20.6-20.6zM-260.6 418c0-.2.1-.4.2-.5.3-.3.8-.3 1.1 0l6.8 6.8 6.8-6.8c.3-.3.8-.3 1.1 0 .3.3.3.8 0 1.1l-7.3 7.3c-.3.3-.8.3-1.1 0l-7.3-7.3c-.3-.2-.3-.4-.3-.6z" />
                        </svg></a>

                    <div class="ser_sub">
                        <button class="btn-more">جربه الآن</button>
                    </div>

                </div>
            </section>
        </main>


        <div class="container page">
            <section id="mobileApp">
                <div id="serv"></div>
                <div class="container">
                    <div class="timeline">
                        <div class="timeline-row">
                            <div class="timeline-time">
                                <div class="mob_imgs">
                                    <img src="{{asset('landing/images/tab-1.png')}}" />
                                </div>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-attachment"></i>
                                <h4> وسيط إدارة الموارد البشرية</h4>
                                <p>يمكنك الآن إدارة جميع احتياجات التوظيف الخاصة بك في مكان واحد ، بغض النظر عن نوع الوظيفة.
                                </p>
                                <div class="thumbs">
                                    ......
                                </div>
                            </div>
                        </div>

                        <div class="timeline-row" style="margin-top: 350px;position: relative;">
                            <div class="timeline-time">
                                <div class="mob_imgs">
                                    <img src="{{asset('landing/images/sec-3.png')}}" />
                                </div>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-code"></i>
                                <h4>وسيط توظيف الموارد البشرية </h4>
                                <p>

                                    ابحث عن أفضل المواهب في المكان المناسب وبالتكلفة المناسبة. نجعل الأمر سهلاً من خلال
                                    مطابقتك مع شبكتنا من شركاء التوظيف الخبراء بناءً على أهداف التوظيف العالمية - حتى تتمكن
                                    من النجاح بشكل أسرع في سوق تنافسية.
                                </p>

                                <div class="thumbs">
                                    ......
                                </div>

                            </div>
                        </div>


                        <div class="timeline-row" style="margin-top: 350px;position: relative;">
                            <div class="timeline-time">
                                <div class="mob_imgs">
                                    <img src="{{asset('landing/images/tab-2.png')}} " />
                                </div>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-code"></i>
                                <h4>تعيين موظفين جدد حول العالم في أيام: أفضل تجربة لك ولموظفك الجديد. </h4>
                                <p>

                                    ضع موظفيك الجدد على مستوى العالم لتحقيق النجاح. قم بإنتاج عقود عمل متوافقة محليًا بسلاسة
                                    ودعوة الموظفين الجدد إلى منصتنا - لقد بدأت بالفعل بداية رائعة معًا.

                                </p>

                                <div class="thumbs">
                                    ......
                                </div>

                            </div>
                        </div>


                        <div class="timeline-row" style="margin-top: 350px;position: relative;">
                            <div class="timeline-time">
                                <div class="mob_imgs">
                                    <img src="{{asset('landing/images/sec-2.png')}}" />
                                </div>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-code"></i>
                                <h4>خيارات سداد مرنة. كشوف رواتب في الوقت المحدد خالية من الأخطاء.
                                </h4>
                                <p>قم بتمويل كشوف المرتبات بالطريقة التي تريدها - والعملات المشفرة والتحويل المصرفي والمزيد.
                                    أضف المكافآت والعمولات والاستثناءات بسهولة ببضع نقرات.
                                </p>

                                <div class="thumbs">
                                    ......
                                </div>

                            </div>
                        </div>


                        <div class="timeline-row" style="margin-top: 350px;position: relative;">
                            <div class="timeline-time">
                                <div class="mob_imgs">
                                    <img src="{{asset('landing/images/tab-3.png')}}" />
                                </div>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-code"></i>
                                <h4>مزايا تنافسية لجذب أفضل المواهب.
                                </h4>
                                <p>
                                    قدم للموظفين العالميين مزايا تنافسية محلية يتم تحديثها باستمرار من قبل خبرائنا العالميين
                                    لتلبية اللوائح والقواعد الخاصة بكل بلد. إدارة خطط المزايا بسهولة من خلال منصتنا وتوفير
                                    تجربة موظف خالية من الاحتكاك.
                                </p>

                                <div class="thumbs">
                                    ......
                                </div>

                            </div>
                        </div>

                        <div class="timeline-row" style="margin-top: 350px;position: relative;">
                            <div class="timeline-time">
                                <div class="mob_imgs">
                                    <img src="{{asset('landing/images/top-banner.png')}}" />
                                </div>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-code"></i>
                                <h4>إدارة الوقت والنفقات بسلاسة لك ولفريقك.
                                </h4>
                                <p>يمكنك مراجعة طلبات الوقت والنفقات للموظفين العالميين وتفويضها بسهولة ، سواء في بيئات
                                    الويب أو الأجهزة المحمولة. جميع تفاصيل تقرير المصاريف مركزية لتخفيف عبء العمل على فريقك
                                    المالي.

                                </p>

                                <div class="thumbs">
                                    ......
                                </div>

                            </div>
                        </div>

                        <div class="timeline-row" style="margin-top: 350px;position: relative;">
                            <div class="timeline-time">
                                <div class="mob_imgs">
                                    <img src="{{asset('landing/images/our-solution-technology-time-expense-content-4-new.jpeg')}}" />
                                </div>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-code"></i>
                                <h4>توسع في بلدان جديدة دون مغادرة منصتنا. </h4>
                                <p>يمكنك الوصول إلى الإرشادات في الوقت المناسب لمعرفة المزيد حول البلدان محل الاهتمام ،
                                    والحصول على عرض أسعار ، وتوقيع عقد ، وإطلاق شركتك في بلد جديد - كل ذلك ببضع نقرات.
                                </p>

                                <div class="thumbs">
                                    ......
                                </div>

                            </div>
                        </div>

                        <div class="timeline-row" style="margin-top: 350px;position: relative;">
                            <div class="timeline-time">
                                <div class="mob_imgs">
                                    <img src="{{asset('landing/images/our-solution-technology-payroll-content-2-new.jpeg')}}" />
                                </div>
                            </div>
                            <div class="timeline-content">
                                <i class="icon-code"></i>
                                <h4>استخدم مركز المساعدة الخاص بنا للحصول على الدعم على طول الطريق.
                                </h4>
                                <p>يمكنك الوصول إلى أهدافك بشكل أسرع من خلال تقنيتنا ، بدعم من فريقنا العالمي. تواصل مع خبير
                                    في الموضوع من خلال مركز المساعدة. لديك دائمًا إمكانية الوصول إلى المعرفة والدعم لتوظيف
                                    فريقك العالمي وإدارته بنجاح.

                                </p>

                                <div class="thumbs">
                                    ......
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </section>


            <div class="container">
                <footer class="row row-cols-5 py-5 my-5 border-top">
                    <div class="col-12 col-md-3 footerlogo">
                        <a href="#"><img src="{{asset('landing/images/logo.svg')}}" /></a>
                    </div>



                    <div class="col-12 col-md-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>