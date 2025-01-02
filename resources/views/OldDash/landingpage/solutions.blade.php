@extends('landingpage.includes.master')
@section('title') Solutions @endsection
@section('content')

    <div class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">برنامج إدارة الموارد البشرية</h1>
            <p class="lead"> نظام واحد لرقمنة شؤون الموظفين بتكامل مع كل المنصات التي تحتاجها، متوافق مع نظام
                العمل السعودي ويوفر حماية موثوقة لبياناتك </p>
        </div>

        <div>
            <div class="join-section">
                <div class="row my-5">
                    <div class="col-md-6">
                        <h2>متكامل، كل شيء في مكان واحد</h2>
                        <p>
                            نظام واحد لرقمنة شؤون الموظفين بتكامل مع كل المنصات التي تحتاجها،
                            متوافق مع نظام العمل السعودي ويوفر حماية موثوقة لبياناتك
                        </p>
                        <div class="more">

                            <a href="#" class="btn-more">جربه الآن</a>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid" src="{{asset('front/assets/sec-3.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection