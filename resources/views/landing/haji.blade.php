@extends('layouts.app')

@section('title', 'Paket Haji Khusus | Amanah Mulia Wisata')

@section('content')

<!--Page Title-->
<section class="page-title-hero">
    <div class="auto-container">
        @if ($haji)
            <h1>{{ $haji->nama }}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Program Haji Khusus</li>
            </ul>
        @else
            <!-- Handle ketika data Haji tidak ditemukan -->
            <h1>Data Haji Tidak Ditemukan</h1>
        @endif
    </div>
</section>
<!--End Page Title-->

<!-- Event Detail -->
<section class="event-detail">
    <div class="bg-tambahan-haji"></div>
    <div class="auto-container">
        @if ($haji)
            <div class="image-box" style="z-index: 2;">
                <figure class="image wow fadeIn"><img src="{{ asset('asset_web/paket/haji/' . $haji->banner) }}"
                        class="lightbox-image"></figure>
            </div>
            <div class="bg-tambahan-haji-atas"></div>
            <div class="sec-title" style="margin-bottom:20px; margin-left:10px;">
                <h2>Deskripsi</h2>
            </div>

            <div class="info-column">
                <div class="inner-column">
                    <div class="event-info-tabs tabs-box">
                        <!--Tabs Box-->
                        <ul class="tab-buttons clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab1">Program Perjalanan</li>
                            <li class="tab-btn" data-tab="#tab2">Termasuk</li>
                            <li class="tab-btn" data-tab="#tab3">Paket Tidak Termasuk</li>
                        </ul>

                        <div class="tabs-content">
                            <!--Tab-->
                            <div class="tab active-tab" id="tab1">
                                {!! $haji->itenary !!}
                            </div>

                            <!--Tab-->
                            <div class="tab" id="tab2">
                                {!! $haji->harga_termasuk !!}
                            </div>

                            <!--Tab-->
                            <div class="tab" id="tab3">
                                {!! $haji->harga_tidak !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Handle ketika data Haji tidak ditemukan -->
            <p>Data Haji tidak ditemukan</p>
        @endif
    </div>
</section>

@endsection
