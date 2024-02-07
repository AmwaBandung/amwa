<!-- Main Footer -->
<footer class="main-footer">
    <!--Widgets Section-->
    <div class="widgets-section">
        <div class="auto-container">
            <div class="row">
                <!--Big Column-->
                <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <!--Footer Column-->
                        <div class="footer-column col-xl-8 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget about-widget">
                                {{-- <div class="logo">
                                    <a href="index.html"><img src="{{('templates/landing/images/favicon.png')}}" alt=""
                                            style="max-height:100px" /></a>
                                </div> --}}
                                <div class="text-justify">
                                    <h2 class="widget-title">PT. AMANAH MULIA WISATA</h2>
                                    <p style="color: #cecccc">PT. Amanah Mulia Wisata (Amanah Mulia) berdedikasi pada perjalanan haji khusus dan umrah. Didirikan pada tahun 2001 dengan semangat melayani setulus hati dan membimbing para tamu Allah sesuai manasik Rasulallah. Disamping perjalanan haji khusus dan umrah, kami juga menghadirkan layanan muslim tour. <br>
                                        Komitmen kami adalah memberikan layanan terbaik dengan fokus pada service, kenyamanan, dan keamanan bagi seluruh jemaah kami.
                                    </p>
                                </div>
                                <ul class="social-icon-one social-icon-colored">
                                    <li><a href="https://linktr.ee/amwatours"><i class="fab fa-whatsapp"></i></a></li>
                                    <li><a href="https://www.instagram.com/amwa_official/" target="_blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.facebook.com/amwahajiumrah/" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-xl-4 col-lg-6 col-md-6 col-sm-12">
                            <div class="footer-widget useful-links">
                                <h2 class="widget-title">Menu</h2>
                                <ul class="user-links">
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li><a href="{{route('profil')}}">Profil</a></li>
                                    <li><a href="{{route('umrah')}}">Umrah</a></li>
                                    <li><a href="{{route('haji')}}">Haji Khusus</a></li>
                                    <li><a href="{{route('gallery')}}">Galeri</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Big Column-->
                <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <!--Footer Column-->
                            <div class="footer-widget contact-widget">
                                <h2 class="widget-title">Contact Us</h2>
                                <!--Footer Column-->
                                <div class="widget-content">
                                    <ul class="contact-list">
                                        <li>
                                            <span class="icon flaticon-clock"></span>
                                            <ul class="flex-container flex-start ">
                                                <li class="flex-item pl-0 mb-0" style="width: 100px;">Senin - Jumat</li>
                                                <li class="flex-item pl-0">&nbsp;:</li>
                                                <li class="flex-item pl-1">08.00 - 16.00</li>
                                            </ul>
                                            <ul class="flex-container flex-start">
                                                <li class="flex-item pl-0 mb-0" style="width: 100px;">Sabtu</li>
                                                <li class="flex-item pl-0">&nbsp;:</li>
                                                <li class="flex-item pl-1">08.00 - 14.00</li>
                                            </ul>
                                        </li>


                                        <li>
                                            <span class="icon flaticon-phone"></span>
                                            <div class="text"><a href="tel:+62214222015">022-4222015 | 022-4205971</a>
                                            </div>
                                        </li>

                                        <li>
                                            <span class="icon flaticon-paper-plane"></span>
                                            <div class="text"><a
                                                    href="mailto:marketing@example.com">marketing@amwatour.com</a></div>
                                        </li>

                                        <li>
                                            <span class="icon flaticon-worldwide"></span>
                                            <div class="text">Jl. Taman Citarum no. 3, Citarum, Bandung Wetan,<br> Kota
                                                Bandung, Jawa Barat <br>40115</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                            <!--Footer Column-->
                            <div class="footer-widget instagram-widget">
                                <h2 class="widget-title">Kantor Kami</h2>
                                <div class="widget-content">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.55479970863993!2d107.62096698126838!3d-6.905333389255591!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64ace88d69d%3A0x71960e7c7210c965!2sAMWA%20Tours%20%26%20Travel%20(Umrah%20%26%20Hajj%20Special)!5e0!3m2!1sen!2sid!4v1697111573482!5m2!1sen!2sid"
                                        height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="copyright-text">
                    <p>© Copyright
                        <?= date("Y"); ?> All Rights Reserved by <a href="{{route('home')}}">Amanah Mulia Wisata</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
