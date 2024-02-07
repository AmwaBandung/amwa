@extends('layouts.app')


@section('title', 'Tentang Kami | Amanah Mulia Wisata')

@section('content')

<!--Page Title-->
<section class="page-title-hero">
    <div class="auto-container">
        <h1>Tentang Kami</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Tentang Kami</li>
        </ul>
    </div>
</section>
<!--End Page Title-->


<!-- Profile section -->
<section class="about-section">
    {{-- <div class="anim-icons full-width">
        <span class="icon icon-circle-blue wow fadeIn"></span>
        <span class="icon icon-dots wow fadeInleft"></span>
        <span class="icon icon-circle-1 wow zoomIn"></span>
    </div> --}}
    <div class="auto-container">
        <div class="row">
            <!-- Content Column -->
            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                <div class="image-box">
                    <figure class="image wow fadeIn"><img src="{{asset('templates/landing/images/amwa-about.webp')}}"
                            alt=""></figure>
                </div>
            </div>
            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>PT. Amanah Mulia Wisata</h2>
                        @if ($profile)
                        <div class="text">
                            <p style="text-align:justify; text-justify: inter-word;">
                                {!! $profile->deskripsi !!}
                            </p>
                        </div>
                        @else
                        <p>Profil Belum Di Input.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End About Section -->

<section class="newsletter-section pt-4 pb-4" style="background: #f8f8f8">
    <div class="auto-container">
        <div class="subscribe-form wow fadeInUp" data-wow-delay="500ms">
            <div class="form-inner">
                <div class="upper-box">
                    <div class="sec-title text-center">
                        <span class="fa fa-quote-left"
                            style="color: #231f1e; font-size: 47px; padding-bottom: 24px;"></span>
                        <h3>Wujudkan Kerinduan Anda Kepada Baitullah Bersama Kami.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features-section">
    <div class="auto-container">
        {{-- <div class="anim-icons">
            <span class="icon icon-shape-4 wow fadeIn"></span>
            <span class="icon icon-line-shape wow fadeIn"></span>
        </div> --}}
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Mengapa memilih kami ?</h2>
                <!-- <span class="title" style="margin-top:1.5em">Membantu saudara muslim sebanyak-banyaknya untuk bisa
                    berangkat Umrah & Haji dengan
                    mudah dan nyaman. </span> -->
            </div>

            <div class="row">
                {{--
                <!-- Feature Block 1 -->
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

                <!-- Feature Block 2 -->
                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-3"><img width="75" height="75"
                                src="{{asset('templates/landing/images/icons/pa-haji.png')}}"
                                alt="external-deal-activism-flaticons-flat-flat-icons" /></div>
                        <h4 class="mb-2"><a href="about.html">Pembimbing Ibadah</a></h4>
                        <div class="text">Pembimbing ibadah memiliki latar belakang keagamaan yang mumpuni serta
                            memiliki kompetensi untuk menjalankan kegiatan ibadah haji dan umrah
                            <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                        </div>
                    </div>
                </div>
                <!-- Feature Block 3-->
                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-2"><img width="75" height="75"
                                src="{{asset('templates/landing/images/icons/tuntunan.png')}}"
                                alt="external-trust-moving-and-storage-flaticons-flat-flat-icons" /></div>
                        <h4 class="mb-2"><a href="about.html">Tuntunan Ibadah</a></h4>
                        <div class="text">Bimbingan ibadah yang kami berikan sesuai dengan tuntunan manasik Rasulallah.
                            <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                        </div>
                    </div>
                </div>
                <!-- Feature Block 4 -->
                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-1"><img width="75" height="75"
                                src="https://img.icons8.com/external-fauzidea-outline-color-fauzidea/64/external-best-seller-e-commerce-fauzidea-outline-color-fauzidea.png"
                                alt="external-Legal-Paper-law-and-justice-vectorslab-glyph-vectorslab" /></div>
                        <h4><a href="about.html">Terpercaya</a></h4>
                        <div class="text">Perusahaan kami telah dipercaya oleh lebih dari 17.000 jemaah. </div>
                        <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                    </div>
                </div>

                <!-- Feature Block 5-->
                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-profile-box">
                        <div class="icon-box mb-1"><img width="75" height="75"
                                src="https://img.icons8.com/external-parzival-1997-outline-color-parzival-1997/64/external-experience-human-networking-parzival-1997-outline-color-parzival-1997.png"
                                alt="address" /></div>
                        <h4><a href="about.html">Berpengalaman</a></h4>
                        <div class="text">Kami telah menyelenggarakan kegiatan ibadah haji khusus dan umrah sejak tahun
                            2001
                            <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                        </div>
                    </div>
                </div> --}}

                @foreach ($kelebihan as $item )
                <div class="feature-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-profile-box">
                        <div class="icon-box"><img width="65" height="65"
                            src="{{asset('asset_web/kelebihan/'.$item->icon)}}" alt="">
                            <h4 class="mt-3"><a href="about.html">{{$item->kelebihan}}</a></h4>
                            <div class="text">
                                {!!$item->deskripsi_kelebihan!!}
                                {{-- <a style="color: #231f1e;" href="https://umrahcerdas.kemenag.go.id/home/detail/27"
                                    target="_blank">
                                    Izin Umrah: SK No. 343 Tahun 2021
                                </a>
                                <br>
                                <a style="color: #231f1e;" href="https://simpu.kemenag.go.id/home/pihkdetail/3013"
                                    target="_blank">
                                    Izin Haji Khusus: SK No. 511 TAHUN 2021
                                </a> --}}
                            </div>

                            <!-- <div class="link-box"><a href="about.html" class="theme-btn">Read More</a></div> -->
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Feature Block 6-->

</section>
<!--End Features Section -->



@endsection