<nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content enable-cookies">
        <!-- Side Header -->
        <div class="content-header content-header-fullrow px-15">
            <!-- Mini Mode -->
            <div class="content-header-section sidebar-mini-visible-b">
                <!-- Logo -->
                <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                    <span class="text-dual-primary-dark">n</span><span class="text-primary">c</span>
                </span>
                <!-- END Logo -->
            </div>
            <!-- END Mini Mode -->

            <!-- Normal Mode -->
            <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times text-danger"></i>
                </button>
                <!-- END Close Sidebar -->

                <!-- Logo -->
                <div class="content-header-item">
                    <a class=" font-w700" href="javascript:void(0)">
                        {{-- <img src="{{asset('assets/media/favicons/favicon2.png')}}" alt="" style="max-height: 45%"> --}}
                        {{-- <img class="" src="{{asset('assets/media/favicons/ugl1.png')}}" alt="" style="max-height: 30px"> --}}
                        <span class="font-size-xl text-dual-primary-dark">Am</span><span class="font-size-xl text-primary">wa</span>
                    </a>
                </div>
                <!-- END Logo -->
            </div>
            <!-- END Normal Mode -->
        </div>
        <!-- END Side Header -->

        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 py-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{asset('assets/media/avatars/64_3.png')}}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="javascript:void(0)">
                    <img class="img-avatar" src="{{asset('assets/media/avatars/64_3.png')}}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="text-dual-primary-dark font-size-s font-w600 text-uppercase pb-10" href="javascript:void(0)">{{Auth::user()->nama}}</a>
                    </li>
                </ul>
                <ul class="list-inline mb-10">
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="si si-logout"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Management Paket</span></a>
                    <ul>
                        <li>
                            <a href="{{route('haji.admin.index')}}">Haji</a>
                        </li>
                        <li>
                            <a href="{{route('umrah.admin.index')}}">Umrah</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Management Profile</span></a>
                    <ul>
                        <li>
                            <a href="{{route('profile.admin.index')}}">Deskripsi Profile</a>
                        </li>
                        <li>
                            <a href="{{route('kelebihan.admin.index')}}">Kelebihan</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('testimoni.admin.index')}}"><i class="si si-users"></i><span class="sidebar-mini-hide">Management Testimoni</span></a>
                </li>
                <li>
                    <a href="{{route('gallery.admin.index')}}"><i class="si si-grid"></i><span class="sidebar-mini-hide">Management Gallery</span></a>
                </li>

            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
</nav>