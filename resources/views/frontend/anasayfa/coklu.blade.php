@php
$kategoriler = App\Models\Kategoriler::orderBy('id','DESC')->get();
$urunler = App\Models\Urunler::where('durum',1)->orderBy('sirano','ASC')->get();
@endphp
            
<section class="portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="section__title text-center">
                    <span class="sub-title">Ürünlerimiz</span>
                    <h2 class="title">Servislerimiz</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
                <ul class="nav nav-tabs portfolio__nav" id="portfolioTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button"
                            role="tab" aria-controls="all" aria-selected="true">Hepsi</button>
                    </li>
                    @foreach($kategoriler as $kategori)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="kategori-tab-{{$kategori->id}}" data-bs-toggle="tab" data-bs-target="#kategoriler{{$kategori->id}}" type="button"
                            role="tab" aria-controls="kategoriler{{$kategori->id}}" aria-selected="false">{{ $kategori->kategori_adi}}</button>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="tab-content" id="portfolioTabContent">
        <div class="tab-pane show active" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
                            @foreach($urunler as $urun)
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset($urun->resim)}}" alt="{{ $urun->baslik }}">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{ $urun['kategoriler']['kategori_adi'] ?? 'Kategori bilgisi yok' }}</span>
                                    <h4 class="title">
                                        <a href="{{ url('urun/'.$urun->id.'/'.$urun->url) }}">{{ $urun->baslik}}</a>
                                    </h4>
                                    <a href="{{ url('urun/'.$urun->id.'/'.$urun->url) }}" class="link">Devamı.....</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach($kategoriler as $kategori)
        <div class="tab-pane" id="kategoriler{{ $kategori->id }}" role="tabpanel" aria-labelledby="kategori-tab-{{$kategori->id}}">
            <div class="container">
                <div class="row gx-0 justify-content-center">
                    <div class="col">
                        <div class="portfolio__active">
                            @php
                            $urunkategori = App\Models\Urunler::where('kategori_id', $kategori->id)->where('durum', 1)->orderBy('sirano', 'ASC')->get();
                            @endphp

                            @forelse($urunkategori as $urunler)
                            <div class="portfolio__item">
                                <div class="portfolio__thumb">
                                    <img src="{{asset($urunler->resim)}}" alt="{{ $urunler->baslik }}">
                                </div>
                                <div class="portfolio__overlay__content">
                                    <span>{{ $urunler['kategoriler']['kategori_adi'] ?? 'Kategori bilgisi yok' }}</span>
                                    <h4 class="title">
                                        <a href="{{ url('urun/'.$urunler->id.'/'.$urunler->url) }}">{{$urunler->baslik}}</a>
                                    </h4>
                                    <a href="{{ url('urun/'.$urunler->id.'/'.$urunler->url) }}" class="link">Devamı.....</a>
                                </div>
                            </div>
                            @empty
                            <div class="col-12 text-center py-5">
                                <h5 class="text-danger">Ürün bulunamadı</h5>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach  
    </div>
</section>

<script>
$(document).ready(function() {
    // Tab değişiminde carousel'ı yeniden başlat
    $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        // Aktif tab içindeki carousel'ı yeniden başlat
        var target = $(e.target).attr("href");
        $(target).find('.portfolio__active').slick('unslick').slick({
            dots: false,
            infinite: true,
            speed: 1000,
            autoplay: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
});

</script>