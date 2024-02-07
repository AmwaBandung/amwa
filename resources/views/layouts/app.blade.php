<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>

    <div class="page-wrapper">

        <!-- Main Header-->
        @include('layouts.header')
        <!--End Main Header -->

        <!-- Content -->
        @yield('content')
        <!-- End Content  -->

        <!-- Main Footer -->
        @include('layouts.footer')
        <!-- End Footer -->

    </div>
    <!--End pagewrapper-->

    <!-- Color Palate / Color Switcher -->
    <div class="color-palate">
        <div class="color-trigger">
            <i class="fa fa-cog"></i>
        </div>
        <div class="color-palate-head">
            <h6>Choose Your Demo</h6>
        </div>
        <ul class="box-version option-box">
            <li>Full width</li>
            <li class="box">Boxed</li>
        </ul>
        <ul class="rtl-version option-box">
            <li>LTR Version</li>
            <li class="rtl">RTL Version</li>
        </ul>
        <div class="palate-foo">
            <span>You will find much more options for colors and styling in admin panel. This color picker is used only
                for demonstation purposes.</span>
        </div>
        <a href="#" class="purchase-btn">Purchase now</a>
    </div><!-- End Color Switcher -->

    <!--Search Popup-->
    <div id="search-popup" class="search-popup">
        <div class="close-search theme-btn"><span class="fas fa-window-close"></span></div>
        <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
                <form method="post" action="index.html">
                    <div class="form-group">
                        <fieldset>
                            <input type="search" class="form-control" name="search-input" value=""
                                placeholder="Search Here" required>
                            <input type="submit" value="Search Now!" class="theme-btn">
                        </fieldset>
                    </div>
                </form>

                <br>
                <h3>Recent Search Keywords</h3>
                <ul class="recent-searches">
                    <li><a href="#">Seo</a></li>
                    <li><a href="#">Bussiness</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">Digital</a></li>
                    <li><a href="#">Conferance</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

    {{-- Floating WA button --}}
    <a href="https://linktr.ee/amwatours" class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    @stack('scripts')
    {{-- Script --}}
    @include('layouts.script')
    {{-- End Script --}}

</body>

</html>