@extends('layouts.frontend')
@section('seo')
    <meta name="keywords" content="{{$companies->first()->keywords}}">
    <meta name="description" content="{{$companies->first()->description}}">
    <title>موقع خدمات - تقديم خدمات منازل شاملة بالسعودية</title>

@endsection

@section('phone')
    <div class="sub_menu">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6 col-sm-8">
                    <div class="sub_menu_right_content">
                    <!--<a href="tel:+{{$companies->count() > 0 ? $companies->first()->phone : null}}"-->
                        <!--   title="الاتصال المباشر"><i-->
                    <!--        class="fa fa-phone"></i>{{$companies->count() > 0 ? $companies->first()->phone : 'لا يوجد رقم'}}-->
                        <!--</a>-->
                        <!--<span>|</span>-->
                        <div>
                            <i class="fa fa-map-marker"></i>{{ $companies->count() > 0 ? $companies->first()->location : 'لا يوجد موقع للشركة بعد'}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-4">
                    <div class="sub_menu_social_icon d-flex justify-content-end">
                        <a target="_blank" href="{{ $companies->count() > 0 ? $companies->first()->facebook : '#' }}">فيس بوك<i
                                class="fa fa-facebook"></i></a>
                        <a target="_blank" href="{{ $companies->count() > 0 ? $companies->first()->twitter : '#' }}">تويتر<i
                                class="fa fa-twitter"></i></a>
                        {!! WhatsappBtn::make($companies->count() > 0 ? $companies->first()->phone : ''); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-contact')
    <a target="_blank" href="tel:+{{$companies->count() > 0 ? $companies->first()->phone : null}}"
       title="الاتصال المباشر">
        <i class="fa fa-phone transition"></i>
    </a>
    {!! WhatsappBtn::make($companies->count() > 0 ? $companies->first()->phone : null); !!}
@endsection

@section('content')
    <!-- Banner Section -->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="banner_text text-center">
                        <div class="banner_text_iner">
                            <h5>أهلا بكم في<span> !</span></h5>
                            <h1>{{ $companies->count() > 0 ? $companies->first()->name : "لم تقم بتسمية الشركة بعد" }}<span>.</span></h1>
                            <div>{{ $companies->count() > 0 ? $companies->first()->short_description : "لا يوجد وصف قصير للشركة" }}</div>
                            <a href="#footer" class="btn_1">تواصل معي</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Section -->



    <!-- About Section -->
    <section class="about-area section-padding" id="about">
        <!-- start section title -->
        <div class="section-title">
            <h2>مـن نحــن</h2>
            <span></span>
        </div>
        <!-- end section title -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 mb-3 mb-lg-0">
                    <span
                        class="subheading">{{ $companies->count() > 0 ? $companies->first()->name : 'لم تقم بتسمية الشركة بعد '}}</span>
                    <p class="about-description">
                        {!! $companies->count() > 0 ? $companies->first()->description : "لا يوجد وصف للشركة" !!}

                    </p>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-img">
                        @if($companies->count() > 0)
                            <img class="img-fluid" src="{{ asset('assets/Images/'.$companies->first()->photo) }}"
                                 alt="موقع خدمات - تقديم خدمات شاملة بالسعودية">
                        @else
                            <h2>لا يوجد صورة</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Section -->

@endsection
