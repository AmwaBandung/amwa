@extends('layouts.app')


@section('title', 'Gallery | Amanah Mulia Wisata')

@section('content')

<!--Page Title-->
<section class="page-title-hero">
    <div class="auto-container">
        <h1>Galeri</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Galeri</li>
        </ul>
    </div>
</section>
<!--End Page Title-->


<section class="grid-section">
    <div class="auto-container">
        <div class="row justify-content-center">
            @foreach ($gallery as $item)
                @if ($item->media_type === 'Image')
                    <div class="grid-item wow fadeIn">
                        <div class="image-box">
                            <div class="image">
                                <img src="{{asset('asset_web/gallery/'.$item->media)}}" alt="">
                            </div>
                            <div class="overlay-box">
                                <a href="{{asset('asset_web/gallery/'.$item->media)}}" class="lightbox-image" data-fancybox="grid" data-thumb="{{asset('asset_web/gallery/'.$item->media)}}">
                                    <span class="icon fa fa-expand-arrows-alt"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Video -->
                    <div class="grid-item wow fadeIn">
                        <div class="image-box">
                            <div class="image">
                                <video autoplay="autoplay" loop muted playsinline>
                                    <source src="{{asset('asset_web/gallery/'.$item->media)}}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div class="overlay-box">
                                <a href="{{asset('asset_web/gallery/'.$item->media)}}" class="lightbox-image" data-fancybox="grid" data-thumb="{{asset('templates/landing/images/resource/video-thumbs.png')}}">
                                    <span class="icon fa fa-expand-arrows-alt"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

    </div>
</section>
<!--End Gallery Section -->

@endsection
