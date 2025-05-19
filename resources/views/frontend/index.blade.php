
@extends('frontend.main_master')


{{-- Seo ayarları  --}}

@php
    $seo= App\Models\Seo::find(1);
@endphp

@section('title') {{ $seo->title }} | {{ $seo->site_adi }}@endsection
@section('author') {{ $seo->author }}@endsection
@section('aciklama') {{ $seo->aciklama }}@endsection
@section('anahtar') {{ $seo->keywords }}@endsection

{{-- Seo ayarları  --}}


@section('main')
<main style="margin-bottom: -460px">
            <!-- banner-area -->
            @include('frontend.anasayfa.banner')
            <!-- banner-area-end -->                 

            <!-- about-area -->
            @include('frontend.anasayfa.anasayfa_hak')
            <!-- about-area-end -->

            <!-- services-area -->
            @include('frontend.anasayfa.random_kategori')
            <!-- services-area-end -->

            <!-- work-process-area -->
            @include('frontend.anasayfa.surec')

            <!-- work-process-area-end -->
           
            <!-- portfolio-area -->
            @include('frontend.anasayfa.coklu')
            <!-- portfolio-area-end -->

            <!-- partner-area -->
            {{-- <section class="partner">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <ul class="partner__logo__wrap">
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/partner_light01.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/partner_01.png')}}" alt="">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/partner_light02.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/partner_02.png')}}" alt="">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/partner_light03.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/partner_03.png')}}" alt="">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/partner_light04.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/partner_04.png')}}" alt="">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/partner_light05.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/partner_05.png')}}" alt="">
                                </li>
                                <li>
                                    <img class="light" src="{{asset('frontend/assets/img/icons/partner_light06.png')}}" alt="">
                                    <img class="dark" src="{{asset('frontend/assets/img/icons/partner_06.png')}}" alt="">
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="partner__content">
                                <div class="section__title">
                                    <span class="sub-title">05 - partners</span>
                                    <h2 class="title">I proud to have collaborated with some awesome companies</h2>
                                </div>
                                <p>I'm a bit of a digital product junky. Over the years, I've used hundreds of web and mobile apps in different industries and verticals. Eventually, I decided that it would be a fun challenge to try designing and building my own.</p>
                                <a href="contact.html" class="btn">Start a conversation</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <!-- partner-area-end -->

            <!-- testimonial-area -->
            @include('frontend.anasayfa.yorumlar')

            <!-- testimonial-area-end -->

<!-- blog-area -->
<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            <!-- Blog Post 1 -->
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="{{asset('frontend/assets/img/blog/blog_post_thumb01.jpg')}}" alt="Blog Post 1"></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Web Design</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">19 Mayıs 2025</span>
                        <h3 class="title"><a href="blog-details.html">Yeni Web Tasarımlarıyla Dikkat Çeken Trendlere Göz Atın</a></h3>
                        <p>2025 yılında web tasarımında en çok dikkat çeken trendler hakkında detaylı bilgiler ve örnekler bulabilirsiniz.</p>
                        <a href="blog-details.html" class="read__more">Daha Fazla Oku</a>
                    </div>
                </div>
            </div>
            <!-- Blog Post 2 -->
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="{{asset('frontend/assets/img/blog/blog_post_thumb02.jpg')}}" alt="Blog Post 2"></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Sosyal Medya</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">18 Mayıs 2025</span>
                        <h3 class="title"><a href="blog-details.html">Sosyal Medya Pazarlamasında Başarıya Ulaşmak İçin İpuçları</a></h3>
                        <p>Sosyal medya platformlarını etkin bir şekilde kullanarak nasıl daha fazla müşteri çekebilirsiniz? İşte ipuçları ve stratejiler.</p>
                        <a href="blog-details.html" class="read__more">Daha Fazla Oku</a>
                    </div>
                </div>
            </div>
            <!-- Blog Post 3 -->
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="{{asset('frontend/assets/img/blog/blog_post_thumb03.jpg')}}" alt="Blog Post 3"></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Yazılım</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">17 Mayıs 2025</span>
                        <h3 class="title"><a href="blog-details.html">2025'te Yazılım Geliştirme Trendleri</a></h3>
                        <p>Yazılım geliştirme süreçleri 2025'te nasıl değişecek? Yeni araçlar ve metodolojiler hakkında detaylı bilgiler.</p>
                        <a href="blog-details.html" class="read__more">Daha Fazla Oku</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- More Blog Button -->
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">Daha Fazla Blog</a>
        </div>
    </div>
</section>
<!-- blog-area-end -->


            
</main>
             @endsection