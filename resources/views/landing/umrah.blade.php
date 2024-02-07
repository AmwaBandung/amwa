@extends('layouts.app')


@section('title', 'Paket Umrah | Amanah Mulia Wisata')

@section('content')

<!--Page Title-->
<section class="page-title-hero">
    <div class="auto-container">
        <h1>Program Umrah</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Program Umrah</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!-- Pricing Section -->
<section class="pricing-section-two alternate">
    <div class="auto-container">
        {{-- <div class="sec-title text-center">
            <h2>Program Umrah</h2>
        </div> --}}

        <div class="outer-box">
            <div class="row">
                @foreach ($umrah as $item)

                <!-- Pricing Block -->
                <div class="pricing-block-paket col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                    <div class="inner-box" style="@if($item->status != 'Available') opacity: 0.6; @endif">
                        <div class="title text-center">{{$item->nama}}</div>
                        <div class="image-box">
                            <figure class="image">
                                <a href="#">
                                    <img src="{{asset('asset_web/paket/umrah/'.$item->thumbnail)}}" alt="">
                                </a>
                            </figure>
                        </div>
                        <div class="btn-box mt-3 mb-2">
                            @if($item->status == 'Available')
                            <a href="{{route('umrah.detail', $item->slug)}}" class="theme-btn btn-style-one"><span
                                    class="btn-title">Detail</span></a>
                            @else
                            <button class="theme-btn btn-style-one" disabled>
                                <span class="btn-title">Sold
                                    Out
                                </span>
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End Pricing Block -->

                <!-- End Pricing Block -->
                @endforeach

            </div>
        </div>
    </div>
</section>
<!--End Pricing Section -->




@endsection