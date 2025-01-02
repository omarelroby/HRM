@extends('landingpage.includes.master')
@section('title') Pricing @endsection
@section('content')

    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">الأسعار</h1>
            <p class="lead">قم ببناء جدول أسعار فعال لعملائك المحتملين بسرعة باستخدام هذا</p>
        </div>
        <div class="row pricing card-deck mb-3 text-center">
            <div class="col-md-4 col-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">مجاناً</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">0 ر. س <small class="text-muted">/
                                شهرى</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>10 مستخدمين متاحيين</li>
                            <li>2 جيجا بايت من التخزين</li>
                            <li>دعم البريد الإلكتروني</li>
                            <li>الوصول إلى مركز المساعدة</li>
                        </ul>
                        <a href="{{asset('login')}}" type="button" class="btn btn-lg btn-block btn-outline-primary">
                            تسجيل دخول مجاناً
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">محترف</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">15 ر. س <small class="text-muted">/
                                شهرى</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>20 مستخدمين متاحيين</li>
                            <li>10 جيجا بايت من التخزين</li>
                            <li>أولوية دعم البريد الإلكتروني</li>
                            <li>الوصول إلى مركز المساعدة</li>
                        </ul>
                        <a href="{{asset('login')}}" type="button" class="btn btn-lg btn-block btn-primary">جرب الآن</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">الشركات</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">29 ر. س <small class="text-muted">/
                                شهرى</small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>30 مستخدمين متاحيين</li>
                            <li>15 جيجا بايت من التخزين</li>
                            <li>دعم الجوال والبريد الإلكتروني</li>
                            <li>الوصول إلى مركز المساعدة</li>
                        </ul>
                        <a href="{{asset('login')}}" class="btn btn-lg btn-block btn-primary">اتصل بنا</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection