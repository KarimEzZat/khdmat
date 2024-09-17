@extends('layouts.frontend')
@section('seo')
     @if(isset($service))
        <meta name="author" content="{{$service->seo->author}}">
        <meta name="og:title" content="{{$service->seo->title}}">
        <meta name="description" content="{{$service->seo->description}}">
        <meta name="og:description" content="{{$service->seo->description}}">
        <meta name="og:site_name" content="{{$service->seo->site_name}}">
        <meta name="og:image:alt" content="{{$service->seo->image_alt}}">
        <meta name="twitter:description" content="{{$service->seo->description}}">
        <meta name="twitter:title" content="{{$service->seo->title}}">
        <meta name="twitter:description" content="{{$service->seo->description}}">
        <meta name="keywords" content="{{$service->seo->keywords}}">
    @endif
    <title>@if(isset($service)){{ $service->title }} {{'| '.$service->phone }}
        - موقع خدمات@else موقع خدمات - تقديم خدمات منازل شاملة بالسعودية@endif</title>
    @if(isset($service))
        <link rel="canonical" href="{{route('services.show', $service->slug)}}">@endif
@endsection
@section('phone')
    @if(isset($service))
        <div class="sub_menu">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-6 col-sm-8">
                        <div class="sub_menu_right_content">
                        <!--<a href="tel:+{{$service->phone}}"-->
                            <!--   title="الاتصال المباشر"><i-->
                        <!--        class="fa fa-phone"></i>{{$service->phone}}-->
                            <!--</a>-->
                            <!--<span>|</span>-->
                            <div>
                                <i class="fa fa-map-marker"></i>{{ $companies->count() > 0 ? $companies->first()->location : 'لا يوجد موقع للشركة بعد'}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-4">
                        <div class="sub_menu_social_icon d-flex justify-content-end">
                            <a target="_blank"
                               href="{{ $companies->count() > 0 ? $companies->first()->facebook : '#' }}">فيس بوك<i
                                    class="fa fa-facebook"></i></a>
                            <a target="_blank"
                               href="{{ $companies->count() > 0 ? $companies->first()->twitter : '#' }}">تويتر<i
                                    class="fa fa-twitter"></i></a>
                            {!! WhatsappBtn::make($service->phone); !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@section('footer-contact')
    @if(isset($service))
        <a target="_blank" href="tel:+{{$service->phone}}"
           title="الاتصال المباشر">
            <i class="fa fa-phone transition"></i>
        </a>
        {!! WhatsappBtn::make($service->phone); !!}
    @elseif(isset($article))
        <a target="_blank" href="tel:+{{$article->service->phone}}"
           title="الاتصال المباشر">
            <i class="fa fa-phone transition"></i>
        </a>
        {!! WhatsappBtn::make($article->service->phone); !!}
    @else
        <a target="_blank" href="tel:+{{$companies->count() > 0 ? $companies->first()->phone : null}}"
           title="الاتصال المباشر">
            <i class="fa fa-phone transition"></i>
        </a>
        {!! WhatsappBtn::make($companies->count() > 0 ? $companies->first()->phone : null); !!}
    @endif
@endsection

@section('content')
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            @if(isset($service))
                                <h1>{{ $service->title}}</h1>
                            @elseif(isset($article))
                                <h1>{{ $article->title }}</h1>
                            @else
                                <h1>المدونة</h1>
                            @endif
                            <p><a href="{{ route('khdmat') }}">الرئيسية</a> <span>-</span>المدونة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-area section-padding">
        <!-- start section title -->

        <!-- end section title -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- start blog left sidebar -->
                    <div class="blog_left_sidebar">

                    @if(isset($articles) && $articles->count() > 0)
                        @foreach($articles as $article)
                            <!-- start blog item -->
                                <article class="blog_item">
                                    <!--<div class="sub_menu_social_icon d-flex justify-content-end mt-3">-->
                                <!--    <a class="ml-5 text-white" href="tel:+{{$article->service->phone}}"-->
                                    <!--       title="الاتصال المباشر"><i-->
                                    <!--            class="fa fa-phone"></i>-->
                                    <!--    </a>-->
                                <!--    {!! WhatsappBtn::make($article->service->phone); !!}-->
                                    <!--</div>-->
                                    <!-- start blog item image -->
                                    @if(isset($article->image))
                                        <div class="blog_item_img">
                                            <img class="card-img rounded-0"
                                                 src="{{ asset('assets/Articles/'.$article->image) }}"
                                                 alt="{{$article->slug}}">
                                            <div class="blog_item_date gradient-bg">
                                                <h4>{{ $article->created_at }}</h4>
                                            </div>
                                        </div>
                                @endif
                                <!-- end blog item image -->
                                    <!-- start blog details -->
                                    <div class="blog_details">
                                        <h2>{{ $article->title }}</h2>
                                        <div class="desc">{!! $article->description !!}</div>
                                    </div>
                                    <!-- end blog details -->

                                </article>
                                <!-- end blog item -->





                            @endforeach


                        @else
                            <h2>لا توجد مقالات</h2>
                        @endif


                    </div>
                    <!-- end blog left sidebar -->

                </div>
            </div>
        </div>
    </section>

    @if(isset($service))
        <section class="faqs-area section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <ul>
                            @if (isset($faqs))
                                @foreach($faqs as $faq)
                                    <li>
                                        <h2>{{ $faq->faq }}</h2>
                                        <div class="mt-1"> {!! $faq->answer !!}</div>
                                    </li>
                                @endforeach
                            @endif

                        </ul>

                    </div>
                </div>
            </div>
        </section>
    @endif



    @if(isset($service))

        <div class="fixed-btn">

            <a target="_blank" href="tel:+{{$service->phone}}" class="ms-call-button">
                <span class="ms-call-txt">إتصل الآن</span>
                <span class="ms-call-icon">
      <svg width="45" height="65" fill="#ff4d42" role="img" focusable="false" aria-hidden="true"
           xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512">
        <path
            d="M352 320c-32 32-32 64-64 64s-64-32-96-64-64-64-64-96 32-32 64-64-64-128-96-128-96 96-96 96c0 64 65.75 193.75 128 256s192 128 256 128c0 0 96-64 96-96s-96-128-128-96z"></path>
      </svg>
    </span>
            </a>

            <div class="ms-whats-button">
                <span class="ms-whats-txt">واتساب</span>
                <div class="ms-call-icon">
                    {!! WhatsappBtn::make($service->phone); !!}
                </div>
            </div>
        </div>



    @else



        <div class="fixed-btn">

            <a target="_blank" href="tel:+{{$companies->count() > 0 ? $companies->first()->phone : null}}"
               class="ms-call-button">
                <span class="ms-call-txt">إتصل الآن</span>
                <span class="ms-call-icon">
      <svg width="45" height="65" fill="#fe5c24" role="img" focusable="false" aria-hidden="true"
           xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 512 512">
        <path
            d="M352 320c-32 32-32 64-64 64s-64-32-96-64-64-64-64-96 32-32 64-64-64-128-96-128-96 96-96 96c0 64 65.75 193.75 128 256s192 128 256 128c0 0 96-64 96-96s-96-128-128-96z"></path>
      </svg>
    </span>
            </a>

            <div class="ms-whats-button">
                <span class="ms-whats-txt">واتساب</span>
                <div class="ms-call-icon">
                    {!! WhatsappBtn::make(($companies->count() > 0 ? $companies->first()->phone : null)) !!}
                </div>
            </div>
        </div>


    @endif




@endsection
