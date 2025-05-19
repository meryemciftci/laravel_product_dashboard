@extends('frontend.main_master')


{{-- Seo ayarları  --}}

@php
    $seo= App\Models\Seo::find(1);
@endphp

@section('title') İletişim | {{ $seo->site_adi }}@endsection
@section('author') {{ $seo->author }}@endsection
@section('aciklama') {{ $seo->aciklama }}@endsection
@section('anahtar') {{ $seo->keywords }}@endsection

{{-- Seo ayarları  --}}

@section('main')

@php
$coklu =App\Models\Cokluresim::all();
@endphp
        <main>
            <!-- breadcrumb-area -->
            <section class="breadcrumb__wrap">
                <div class="container custom-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8 col-md-10">
                            <div class="breadcrumb__wrap__content">
                                <h2 class="title">İletişim</h2>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{url('/')}}">AnaSayfa</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">İletişim Formu</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb__wrap__icon">
                    <ul>
                        @foreach($coklu as $resimler )
                        <li><img src="{{asset($resimler->resim)}}" alt=""></li>
                        @endforeach

                </div>
            </section>
            <!-- breadcrumb-area-end -->

            <!-- contact-map -->
            <div id="contact-map">
                <iframe src="{{ $seo->harita}}"></iframe>
            </div>
            <!-- contact-map-end -->

            <!-- contact-area -->
            <div class="contact-area">
                <div class="container">
                    <form method="post" action="{{ route('teklif.form')}} " class="contact__form" id="myForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6" form-group>
                                <input type="text" name="adi" placeholder="Ad Soyad*">
                                @error('adi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6" form-group>
                                <input type="email" name="email" placeholder="Email adresiniz*">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6" form-group>
                                <input type="text" name="telefon" placeholder="Telefon*">
                                @error('telefon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6" form-group>
                                <input type="text" name="konu" placeholder="Konu*">
                                @error('konu')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <textarea type="text" name="mesaj" id="message" placeholder="Mesajınız*"></textarea>
                                @error('mesaj')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                        <button type="submit" class="btn">İlet</button>
                    </form>
                </div>
            </div>
            <!-- contact-area-end -->
{{-- @php
$footer = App\Models\Footer::find(1);
@endphp --}}
            {{-- <!-- contact-info-area -->
            <section class="contact-info-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="assets/img/icons/contact_icon01.png" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">Adres</h4>
                                    <span>İstanbul</span>
                                    <span>Türkiye</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="assets/img/icons/contact_icon02.png" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">05356568264</h4>
                                    <span>05356568264</span>
                                    <span>05356568264</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="contact__info">
                                <div class="contact__info__icon">
                                    <img src="assets/img/icons/contact_icon03.png" alt="">
                                </div>
                                <div class="contact__info__content">
                                    <h4 class="title">Mail Adresimiz</h4>
                                    <span>email@example.com</span>
                                    <span>info@yourdomain.com</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-info-area-end --> --}}

        </main>

@endsection