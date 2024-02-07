<!-- Preloader -->
<div class="preloader"></div>
<!-- Header span -->

<!-- Header Span -->
{{-- <span class="header-span"></span> --}}

<header class="main-header">
    <div class="main-box">
        <div class="auto-container clearfix">
            <div class="logo-box">
                <div class="logo justify-content-center"><a href="{{route('home')}}"><img src="{{asset('templates/landing/images/logo-amanah-mulia.png')}}" alt="" title="Amanah Mulia"></a>
                </div>
            </div>

            <div style="flex-grow: 1;"></div>

            <!--Nav Box-->
            <div class="nav-outer clearfix">
                <!--Mobile Navigation Toggler-->
                <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon flaticon-menu-button"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li class="dropdown"><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href="{{route('profil')}}">Profil</a></li>
                                    <li><a href="{{route('contact')}}">Kontak</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('umrah')}}">Umrah</a></li>
                            <li><a href="{{route('haji')}}">Haji</a></li>
                            <li><a href="{{route('gallery')}}">Galeri</a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Main Menu End-->

                <!-- Outer box -->
                <div class="outer-box">
                    <!--Search Box-->
                    {{-- <div class="search-box-btn"><span class="flaticon-search"></span></div> --}}

                    <!-- Button Box -->
                    <div class="btn-box">
                        <a href="https://linktr.ee/amwatours" class="theme-btn btn-style-one"><span class="btn-title">Hubungi Kami</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>

        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        <nav class="menu-box">
            <div class="nav-logo"><a href="{{route('home')}}"><img src="{{asset('templates/landing/images/logo-amanah-mulia.png')}}" alt="" title=""></a></div>

            <ul class="navigation clearfix">
                <!--Keep This Empty / Menu will come through Javascript-->
            </ul>
        </nav>
    </div><!-- End Mobile Menu -->
</header>
