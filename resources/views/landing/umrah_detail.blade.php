@extends('layouts.app')


@section('title', 'Paket Umrah Reguler | Amanah Mulia Wisata')

@section('content')

<!--Page Title-->
<section class="page-title-hero">
    <div class="auto-container">
        <h1>{{$umrah->nama}}</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Program Umrah</li>
        </ul>
    </div>
</section>
<!--End Page Title-->

<!-- Event Detail -->
<section class="event-detail">
    <div class="bg-tambahan-haji"></div>
    <div class="auto-container">

        <div class="image-box" style="z-index:1;">
            <figure class="image wow fadeIn"><img src="{{asset('asset_web/paket/umrah/'.$umrah->banner)}}"
                    class="lightbox-image"></figure>
        </div>
        <div class="bg-tambahan-haji-atas"></div>
        <div class="sec-title" style="margin-bottom:20px; margin-left:10px;">
            <h2>Deskripsi</h2>
        </div>

        <div class="info-column col-lg-12 col-md-12 col-sm-12">
            <div class="inner-column">
                <div class="event-info-tabs tabs-box">
                    <!--Tabs Box-->
                    <ul class="tab-buttons clearfix">
                        <li class="tab-btn active-btn" data-tab="#tab1">Rincian Perjalanan</li>
                        <li class="tab-btn" data-tab="#tab2">Termasuk</li>
                        <li class="tab-btn" data-tab="#tab3">Tidak Termasuk</li>
                    </ul>

                    <div class="tabs-content">
                        <!--Tab-->
                        <div class="tab active-tab" id="tab1">

                            {!!($umrah->itenary)!!}

                        </div>

                        <!--Tab-->
                        <div class="tab" id="tab2">

                            {!!($umrah->harga_termasuk)!!}

                        </div>

                        <!--Tab-->
                        <div class="tab" id="tab3">

                            {!!($umrah->harga_tidak)!!}

                        </div>
                    </div>
                </div>
            </div>

        </div>

</section>
<!--End Event Detail -->


@endsection
