@extends('layouts.app')

@section('title', 'Home | Amanah Mulia Wisata')

@section('content')
<!-- Banner Conference -->
<section class="banner-meetup">
    {{-- <div class="bg-pattern"></div> --}}
    <video id="desktopVideo" preload="auto" autoplay="autoplay" loop muted playsinline>
        <source src="{{ $desktopVideoUrl }}" type="video/mp4">
        Your browser doesnt' support the video tag.
    </video>
    {{-- <div class="layer-outer"></div> --}}
    <video id="mobileVideo" class="mobile-video fadeIn" preload="auto" autoplay="autoplay" loop muted playsinline>
        <source src="{{ $mobileVideoUrl }}" type="video/mp4">
        Your browser doesnt' support the video tag.
    </video>


    {{-- <div class="auto-container">
        <div class="content-box">
            <h2 class="mb-3">PT<span style="color: #e31f2b">.</span> AMANAH MULIA WISATA</h2>
            <div class="address" style="margin-bottom: 5vh">"Wujudkan Kerinduan Anda Kepada Baitullah <br> Bersama
                Kami."</div>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="btn-box">
                        <a href="https://umrahcerdas.kemenag.go.id/home/detail/27" class="theme-btn btn-style-one"
                            target="_blank">
                            <span class="btn-title">IZIN UMRAH NO.343/2021</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="btn-box">
                        <a href="https://simpu.kemenag.go.id/home/pihkdetail/3013" class="theme-btn btn-style-one"
                            target="_blank">
                            <span class="btn-title">IZIN HAJI NO.511/2021</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</section>
<!--End Banner Conference -->

<!--Section Why Us -->
{{-- <section class="features-section">
    <div class="auto-container">
        <div class="anim-icons">
            <span class="icon icon-shape-4 wow fadeIn"></span>
            <span class="icon icon-line-shape wow fadeIn"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Mengapa memilih kami ?</h2>
                <span class="title" style="margin-top:1.5em">Membantu saudara muslim sebanyak-banyaknya untuk bisa
                    berangkat Umrah & Haji dengan
                    mudah dan nyaman. </span>
            </div>

            <div class="row">

                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-1"><img width="75" height="75"
                                src="https://img.icons8.com/cotton/64/000000/technical-support.png"
                                alt="technical-support" alt="online-support" alt="certificate" /></div>
                        <h4><a href="#">Layanan</a></h4>
                        <div class="text">Kami selalu mengedepankan layanan service terbaik dengan memperhatikan
                            kenyamanan dan keamanan jemaah</div>
                        <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                    </div>
                </div>


                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-3"><img width="75" height="75"
                                src="{{asset('templates/landing/images/icons/pa-haji.png')}}"
                                alt="external-deal-activism-flaticons-flat-flat-icons" /></div>
                        <h4 class="mb-2"><a href="about.html">Pembimbing Ibadah Kompeten</a></h4>
                        <div class="text">Pembimbing ibadah memiliki latar belakang keagamaan yang kuat serta memiliki
                            kompetensi untuk menjalankan kegiatan ibadah haji dan umrah
                            <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                        </div>
                    </div>
                </div>

                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-2"><img width="75" height="75"
                                src="{{asset('templates/landing/images/icons/tuntunan.png')}}"
                                alt="external-trust-moving-and-storage-flaticons-flat-flat-icons" /></div>
                        <h4 class="mb-2"><a href="about.html">Tuntunan Ibadah Sesuai Syari'at</a></h4>
                        <div class="text">Bimbingan ibadah yang kami berikan sesuai dengan tuntunan manasik Rasulallah.
                            <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                        </div>
                    </div>
                </div>

                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-1"><img width="75" height="75"
                                src="https://img.icons8.com/external-fauzidea-outline-color-fauzidea/64/external-best-seller-e-commerce-fauzidea-outline-color-fauzidea.png"
                                alt="external-Legal-Paper-law-and-justice-vectorslab-glyph-vectorslab" /></div>
                        <h4><a href="about.html">Terpercaya</a></h4>
                        <div class="text">Alhamdulillah perusahaan kami telah dipercaya oleh lebih dari 17.000 jemaah.
                        </div>
                        <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                    </div>
                </div>


                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-1"><img width="75" height="75"
                                src="https://img.icons8.com/external-parzival-1997-outline-color-parzival-1997/64/external-experience-human-networking-parzival-1997-outline-color-parzival-1997.png"
                                alt="address" /></div>
                        <h4><a href="about.html">Berpengalaman</a></h4>
                        <div class="text">Kami telah menyelenggarakan kegiatan ibadah haji dan umrah sejak tahun 2001
                            <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                        </div>
                    </div>
                </div>


                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-profile-box">
                        <div class="icon-box"><img width="65" height="65"
                                src="https://img.icons8.com/cotton/64/contract--v1.png" alt="verified-account" />
                            <h4 class="mt-3"><a href="about.html">Resmi</a></h4>
                            <div class="text">Perusahaan kami terdaftar di Kementerian Agama <br>

                                <a style="color: #231f1e;" href="https://umrahcerdas.kemenag.go.id/home/detail/27"
                                    target="_blank">
                                    Izin Umrah: SK No.343 Tahun 2021
                                </a>
                                <br>
                                <a style="color: #231f1e;" href="https://simpu.kemenag.go.id/home/pihkdetail/3013"
                                    target="_blank">
                                    Izin Haji: SK No.511 TAHUN 2021
                                </a>
                            </div>

                            <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                        </div>
                    </div>


                </div>
</section> --}}
<!--End Features Section -->

<!-- ASOSIASI, PERIZINAN & AKREDITASI -->
{{-- <section class="clients-section-three">
    <div class="auto-container">
        <div class="sec-title text-center" style="margin-bottom: 25px !important;">
            <h2 style="font-size: 24px">ASOSIASI, PERIZINAN & AKREDITASI</h2>
        </div>
        <div class="sponsors-outer">
            <div class="association-wrapper mx-auto pt-1 pb-1">
                <img src="{{asset('templates/landing/images/logo-legal/logo-legalitas.png')}}" alt="">
            </div>
        </div>

    </div>
</section> --}}

{{-- <section class="clients-section-three">
    <div class="auto-container">
        <div class="sponsors-outer">
            <div class="sponsors-carousel owl-carousel owl-theme">
                <!-- Client Block -->
                <div class="client-block">
                    <figure class="image-box"><a href="#"><img
                                src="{{asset('templates/landing/images/logo-legal/logo-kemenag.webp')}}" alt=""></a>
                    </figure>
                </div>

                <!-- Client Block -->
                <div class="client-block">
                    <figure class="image-box"><a href="#"><img
                                src="{{asset('templates/landing/images/logo-legal/logo-asita.webp')}}" alt=""></a>
                    </figure>
                </div>

                <!-- Client Block -->
                <div class="client-block">
                    <figure class="image-box"><a href="#"><img
                                src="{{asset('templates/landing/images/logo-legal/logo-kan.webp')}}" alt=""></a>
                    </figure>
                </div>

                <!-- Client Block -->
                <div class="client-block">
                    <figure class="image-box"><a href="#"><img
                                src="{{asset('templates/landing/images/logo-legal/logo-amphuri.webp')}}" alt=""></a>
                    </figure>
                </div>

            </div>
        </div>
    </div>
</section> --}}
<!--End Section -->


<!-- Pricing Section Umrah -->
<section class="gallery-section-paket">
    <div class="auto-container">
        <div class="sec-title text-center">
            {{-- <span class="title">Paket</span> --}}
            <h2>Program Umrah</h2>
        </div>
        <div class="gallery-carousel-paket owl-carousel owl-theme">
            <!-- Gallery Item -->
            @foreach ($umrahData as $item)
            <div class="gallery-item-paket">
                <div class="outer-box">
                    <div class="pricing-block-paket wow fadeInUp" data-wow-delay="400ms">
                        <div class="inner-box pb-3" style="@if($item->status != 'Available') opacity: 0.6; @endif">
                            <div class="title text-center">{{$item->nama}}</div>
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{asset('asset_web/paket/umrah/'.$item->thumbnail)}}" alt=""></a>
                                </figure>
                            </div>
                            <div class="btn-box pt-3">
                                @if($item->status == 'Available')
                                <a href="{{route('umrah.detail', $item->slug)}}" class="theme-btn btn-style-one"><span
                                        class="btn-title">Detail</span></a>
                                @else
                                <button class="theme-btn btn-style-one" disabled><span class="btn-title">
                                        Sold Out</span></button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="btn-box mt-3 text-center">
            <a href="{{route('umrah')}}" class="theme-btn btn-style-two" target="_blank">
                <span class="btn-title">Lihat Semua Paket</span>
            </a>
        </div>
    </div>

</section>
<!--End Pricing Section Haji -->

<!-- Pricing Section Haji -->
<section class="pricing-section-two" style="background: #f8f8f8 !important">
    {{-- <div class="bg-tambahan"></div> --}}
    <div class="auto-container">
        <div class="sec-title text-center">
            {{-- <span class="title">Paket Spesial</span> --}}
            <h2>Program Haji Khusus</h2>
        </div>

        @if ($haji)
        <div class="outer-box">
            <div class="row">
                <div class="pricing-block-paket col-lg-6 col-md-6 col-sm-12 wow fadeInUp mx-auto"
                    data-wow-delay="400ms">
                    <div class="inner-box pb-3">
                        {{-- <div class="title text-center"></div> --}}
                        <div class="image-box">
                            <figure class="image">
                                <img src="{{asset('asset_web/paket/haji/'.$haji->thumbnail)}}" alt="">
                            </figure>
                        </div>
                        <div class="btn-box mt-3">
                            <a href="{{route('haji')}}" class="theme-btn btn-style-one" target="_blank">
                                <span class="btn-title">Detail</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="outer-box">
            <div class="row">
                <div class="pricing-block-paket col-lg-6 col-md-6 col-sm-12 wow fadeInUp mx-auto"
                    data-wow-delay="400ms">
                    <div class="inner-box pb-3">
                        <div class="title text-center">Paket Haji Belum Tersedia.</div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
<!-- END Pricing Section Haji -->
<!-- Call to action -->
<section class="call-to-action"
    style="background-image:url('{{asset('templates/landing/images/background/bgkabah1.webp')}}');">
    <div class="auto-container">
        <div class="content-box">
            <div class="text">Jadwalkan Sekarang Juga</div>
            <h2>Dapatkan Penawaran Terbaik<br> untuk Perjalanan Haji Khusus & Umrah Anda</h2>
            <div class="btn-box">
                <a href="https://linktr.ee/amwatours" class="theme-btn btn-style-one"
                    style="border-radius: 30px !important;" target="_blank">
                    <span class="btn-title">Daftar Sekarang</span>
                </a>
            </div>
        </div>
    </div>
</section>
<!--End Call to action -->

<!-- Gallery Section -->
<section class="gallery-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Galeri</h2>
        </div>

        <div class="row">
            <div class="gallery-carousel owl-carousel owl-lazy owl-theme">
                @foreach ($galleryData as $item)
                @if ($item->media_type === 'Image')
                <!-- Image -->
                <div class="gallery-item">
                    <div class="image-box">
                        <div class="image">
                            <img data-src="{{asset('asset_web/gallery/'.$item->media)}}" alt="">
                        </div>
                        <div class="overlay-box">
                            <a href="{{asset('asset_web/gallery/'.$item->media)}}" class="lightbox-image"
                                data-fancybox="gallery-home" data-thumb="{{asset('asset_web/gallery/'.$item->media)}}">
                                <span class="icon fa fa-expand-arrows-alt"></span>
                            </a>
                        </div>
                    </div>
                </div>
                @else
                <!-- Video -->
                <div class="gallery-item">
                    <div class="image-box">
                        <div class="image">
                            <video autoplay="autoplay" loop muted playsinline>
                                <source src="{{asset('asset_web/gallery/'.$item->media)}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="overlay-box">
                            <a href="{{asset('asset_web/gallery/'.$item->media)}}" class="lightbox-image"
                                data-fancybox="gallery-home"
                                data-thumb="{{asset('templates/landing/images/resource/video-thumbs.png')}}">
                                <span class="icon fa fa-expand-arrows-alt"></span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>

        <div class="btn-box mt-3 text-center">
            <a href="{{route('gallery')}}" class="theme-btn btn-style-two" target="_blank">
                <span class="btn-title">Lihat Semua</span>
            </a>
        </div>
    </div>
</section>
<!--End Gallery Section -->

<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="anim-icons">
        <span class="icon icon-dots-3 wow zoomIn"></span>
        {{-- <span class="icon icon-circle-3 wow zoomIn"></span> --}}
    </div>

    <div class="auto-container">
        <div class="sec-title text-center">
            <h2>Bagaimana Pendapat Mereka </h2>
        </div>

        <div class="carousel-outer">
            <div class="single-item-carousel owl-carousel owl-theme">
                @foreach ($testimoni as $item)
                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner">
                        <div class="image-box pt-2">
                            <figure class="image">
                                @if($item->foto == Null)
                                @if($item->gender=='Ikhwat')
                                <img src="{{asset('templates/landing/images/resource/user-testimoni-1.png')}}"
                                    style="max-height: 50% !important" alt="">
                                @else
                                <img src="{{asset('templates/landing/images/resource/user-testimoni-2.png')}}"
                                    style="max-height: 50% !important" alt="">
                                @endif
                                @else
                                <img src="{{asset('asset_web/testimoni/'.$item->foto )}}" alt="">
                                @endif
                            </figure>
                        </div>
                        <div class="text">{!!$item->testimoni!!}</div>
                        <div class="name">{{$item->nama}}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section -->

@endsection