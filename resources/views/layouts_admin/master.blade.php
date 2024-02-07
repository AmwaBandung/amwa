<!doctype html>
<html lang="en" class="no-focus">

<head>
    @include('layouts_admin.incl_top')
</head>

<body>
    <div id="page-container" class="sidebar-o sidebar-inverse enable-page-overlay side-scroll page-header-fixed page-header-modern main-content-boxed">

        <!-- Sidebar -->
        @include('layouts_admin.sidebar')
        <!-- END Sidebar -->

        <!-- Header -->
        @include('layouts_admin.header')
        <!-- END Header -->

        <!-- Main Container -->
        <main id="main-container">

            <!-- Page Content -->
            @yield('content')
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        @include('layouts_admin.footer')
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/jquery.countTo.min.js
            assets/js/core/js.cookie.min.js
        -->
    {{-- Include Bot --}}
    @include('layouts_admin.incl_bot')
    @stack('scripts')
    {{-- End Include Bot --}}
</body>

</html>