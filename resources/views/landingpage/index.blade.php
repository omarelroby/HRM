@extends('landingpage.includes.master')
@section('title') Home @endsection
@section('content')


  <!-- --------------------------------------- Slider ---------------------------------------- -->
  <div class="home-slider">
    <div class="container">
      <div class="row">
        <div class="py-5 col-lg-6 col-md-12 col-12">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src=" {{asset('front/assets/tab-1.png')}}" class="d-block w-100" alt="tab-1">
              </div>
              <div class="carousel-item">
                <img src="{{asset('front/assets/tab-2.png')}}" class="d-block w-100" alt="tab-2">
              </div>
              <div class="carousel-item">
                <img src="{{asset('front/assets/tab-3.png')}}" class="d-block w-100" alt="tab-3">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <div class="py-5 col-lg-6 col-md-12 col-12 text-sm-center">
          <h2> Everything that you need to manage human resources in Saudi Arabia! </h2>
          <div class="more-button">

          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- --------------------------------------- /Slider ---------------------------------------- -->


  <!-- --------------------------------------- Timeline ---------------------------------------- -->
  <div class="timeline-section">
      <div class=" bootdey">
          <div class="gutters">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                  <div class="card timeline-card">
                      <div class="card-body">
                          <!-- Timeline start -->
                          <div class="timeline">
                              <div class="timeline-row">
                                  <div class="timeline-time">
                                  <img src="{{asset('front/assets/tab-1.png')}}" alt="">
                                      <!-- 7:45PM<small>May 21</small> -->
                                  </div>
                                  <div class="timeline-dot fb-bg"></div>
                                  <div class="timeline-content">
                                      <h2> وسيط إدارة الموارد البشرية </h2>
                                      <p> يمكنك الآن إدارة جميع احتياجات التوظيف الخاصة بك في مكان واحد ، بغض النظر عن
                                          نوع الوظيفة. </p>
                                  </div>
                              </div>
                              <div class="timeline-row">
                                  <div class="timeline-time">
                                  <img src="{{asset('front/assets/tab-2.png')}}" alt="">
                                  </div>
                                  <div class="timeline-dot green-one-bg"></div>
                                  <div class="timeline-content green-one">
                                      <h2> وسيط توظيف الموارد البشرية </h2>
                                      <p>
                                          ابحث عن أفضل المواهب في المكان المناسب وبالتكلفة المناسبة. نجعل الأمر سهلاً
                                          من خلال مطابقتك مع شبكتنا من شركاء التوظيف الخبراء بناءً على أهداف التوظيف
                                          العالمية - حتى تتمكن من النجاح بشكل أسرع في سوق تنافسية.
                                      </p>

                                  </div>
                              </div>
                              <div class="timeline-row">
                                  <div class="timeline-time">
                                  <img src="{{asset('front/assets/sec-2.png')}}" alt="">
                                  </div>
                                  <div class="timeline-dot green-two-bg"></div>
                                  <div class="timeline-content green-two">
                                      <h2> تعيين موظفين جدد حول العالم في أيام: أفضل تجربة لك ولموظفك الجديد.
                                      </h2>
                                      <p> ضع موظفيك الجدد على مستوى العالم لتحقيق النجاح. قم بإنتاج عقود عمل متوافقة
                                          محليًا بسلاسة ودعوة الموظفين الجدد إلى منصتنا - لقد بدأت بالفعل بداية رائعة
                                          معًا. </p>

                                  </div>
                              </div>
                              <div class="timeline-row">
                                  <div class="timeline-time">
                                  <img src="{{asset('front/assets/sec-3.png')}}" alt="">
                                  </div>
                                  <div class="timeline-dot green-three-bg"></div>
                                  <div class="timeline-content green-three">
                                      <h2> خيارات سداد مرنة. كشوف رواتب في الوقت المحدد خالية من الأخطاء. </h2>
                                      <p>
                                          قم بتمويل كشوف المرتبات بالطريقة التي تريدها - والعملات المشفرة والتحويل
                                          المصرفي والمزيد. أضف المكافآت والعمولات والاستثناءات بسهولة ببضع نقرات.
                                      </p>

                                  </div>
                              </div>
                              <div class="timeline-row">
                                  <div class="timeline-time">
                                  <img src="{{asset('front/assets/top-banner.png')}}" alt="">
                                  </div>
                                  <div class="timeline-dot green-four-bg"></div>
                                  <div class="timeline-content green-four">
                                      <h2> مزايا تنافسية لجذب أفضل المواهب. </h2>
                                      <p class="no-margin"> قدم للموظفين العالميين مزايا تنافسية محلية يتم تحديثها
                                          باستمرار من قبل خبرائنا العالميين لتلبية اللوائح والقواعد الخاصة بكل بلد.
                                          إدارة خطط المزايا بسهولة من خلال منصتنا وتوفير تجربة موظف خالية من الاحتكاك.
                                      </p>

                                  </div>
                              </div>
                              <div class="timeline-row">
                                  <div class="timeline-time">
                                  <img src="{{asset('front/assets/top-banner.png')}}" alt="">
                                  </div>
                                  <div class="timeline-dot teal-bg"></div>
                                  <div class="timeline-content teal">
                                      <h2> إدارة الوقت والنفقات بسلاسة لك ولفريقك. </h2>
                                      <p class="no-margin"> يمكنك مراجعة طلبات الوقت والنفقات للموظفين العالميين
                                          وتفويضها بسهولة ، سواء في بيئات الويب أو الأجهزة المحمولة. جميع تفاصيل تقرير
                                          المصاريف مركزية لتخفيف عبء العمل على فريقك المالي. </p>

                                  </div>
                              </div>
                              <div class="timeline-row">
                                  <div class="timeline-time">
                                  <img src="{{asset('front/assets/sec-2.png')}}" alt="">
                                  </div>
                                  <div class="timeline-dot sea-green-bg"></div>
                                  <div class="timeline-content sea-green">
                                      <h2> توسع في بلدان جديدة دون مغادرة منصتنا. </h2>
                                      <p> يمكنك الوصول إلى الإرشادات في الوقت المناسب لمعرفة المزيد حول البلدان محل
                                          الاهتمام ، والحصول على عرض أسعار ، وتوقيع عقد ، وإطلاق شركتك في بلد جديد -
                                          كل ذلك ببضع نقرات. </p>

                                  </div>
                              </div>
                              <div class="timeline-row">
                                  <div class="timeline-time">
                                  <img src="{{asset('front/assets/top-banner.png')}}" alt="">
                                  </div>
                                  <div class="timeline-dot teal-bg"></div>
                                  <div class="timeline-content teal">
                                      <h2> استخدم مركز المساعدة الخاص بنا للحصول على الدعم على طول الطريق. </h2>
                                      <p class="no-margin"> يمكنك الوصول إلى أهدافك بشكل أسرع من خلال تقنيتنا ، بدعم
                                          من فريقنا العالمي. تواصل مع خبير في الموضوع من خلال مركز المساعدة. لديك
                                          دائمًا إمكانية الوصول إلى المعرفة والدعم لتوظيف فريقك العالمي وإدارته بنجاح.
                                      </p>
                                  </div>
                              </div>
                          </div>
                          <!-- Timeline end -->

                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- --------------------------------------- /Timeline ---------------------------------------- -->

@endsection