
            <!-- contact-area -->
            @if (!Request::is('iletisim'))
            <section class="homeContact" style="margin-top:230px; ">
                <div class="container">
                    <div class="homeContact__wrap">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="section__title">
                                        <span class="sub-title">Bize Ulaşın</span>
                                        <h2 class="title">Herhangi bir sorunuz mu var? <br> Teklif almak için bizimle iletişime geçin!</h2>
                                    </div>
                                    <div class="homeContact__content">
                                        <p>Eğer herhangi bir sorunuz varsa ya da daha fazla bilgi almak isterseniz, bizimle iletişime geçmekten çekinmeyin! İhtiyaçlarınıza yönelik kişisel bir teklif sunmak için buradayız. Aşağıdaki formu doldurduğunuzda, en kısa sürede size geri dönüş yapacağız.</p>
                                        <h2 class="mail"><a href="mailto:email@example.com">email@example.com</a></h2>
                                        <p>Ya da, doğrudan <strong>teklif almak için formu doldurun</strong>:</p>
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="homeContact__form">
                                   <form method="post" action="{{ route('teklif.form')}} " class="contact__form form-group" id="myForm">
                                      @csrf
                                        <input type="text" name="adi" placeholder="Ad Soyad*">
                                        @error('adi')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        <input type="email" name="email" placeholder="Email adresiniz*">
                                        @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        <input type="text" name="telefon" placeholder="Telefon*">
                                        @error('telefon')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        <input type="text" name="konu" placeholder="Konu*">
                                        @error('konu')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        <textarea type="text" name="mesaj" id="message" placeholder="Mesajınız*"></textarea>
                                         @error('mesaj')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                        <button type="submit">Teklif Gönder</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            <!-- contact-area-end -->



<!-- Footer İletişim Bilgileri -->
<footer class="footer">
    <section class="contact-info-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Adres Kutusu -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{asset('frontend/assets/img/icons/contact_icon01.png')}}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Adres</h4>
                            <span>İstanbul</span>
                            <span>Türkiye</span>
                        </div>
                    </div>
                </div>
                <!-- Telefon Kutusu -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{asset('frontend/assets/img/icons/contact_icon02.png')}}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Telefon</h4>
                            <span>05356568264</span>
                            <span>05356568264</span>
                        </div>
                    </div>
                </div>
                <!-- E-posta Kutusu -->
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{asset('frontend/assets/img/icons/contact_icon03.png')}}" alt="">
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
</footer>
