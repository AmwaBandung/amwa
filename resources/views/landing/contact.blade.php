@extends('layouts.app')


@section('title', 'Contact | Amanah Mulia Wisata')

@section('content')

    <!--Page Title-->
    <section class="page-title-hero">
        <div class="auto-container">
            <h1>Kontak Kami</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>Kontak</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

<!-- Contact Page Section -->
<section class="contact-page-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="contact-column col-lg-4 col-md-12 col-sm-12 order-2">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>Info Kontak</h2>
                    </div>
                    <ul class="social-icon-contact social-icon-colored">
                        <li>
                            <a href="https://maps.app.goo.gl/qmNmBQ9VVNJU9jff9" target="_blank">
                                <i class="fa fa-location-dot"></i>&nbsp;&nbsp;
                                <span>Jl. Taman Citarum No.3, Kota Bandung.</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-phone"></i>&nbsp;&nbsp;
                                <span>022-4222015 | 022-4205971</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:admin@amanahmulia.com" target="_blank">
                                <i class="fa fa-envelope-o"></i>&nbsp;&nbsp;
                                <span>admin@amanahmulia.com</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://linktr.ee/amwatours " target="_blank">
                                <i class="fab fa-whatsapp"></i>&nbsp;&nbsp;
                                <span>Whatsapp</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/amwa_official/" target="_blank">
                                <i class="fab fa-instagram"></i>&nbsp;&nbsp;
                                <span>@amwa_official</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/amwahajiumrah/" target="_blank">
                                <i class="fab fa-facebook-f"></i>&nbsp;&nbsp;
                                <span>Amwa Tours Haji Umrah</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <!-- Form Column -->
            <div class="form-column col-lg-8 col-md-12 col-sm-12">
                <div class="inner-column">
                    <div class="contact-form">
                        <div class="sec-title">
                            <h2>Hubungi Kami</h2>
                        </div>
                        <form id="contactForm" method="POST" autocomplete="off" autofill="off">
                            @csrf
                            <input type="hidden" name="_captcha" value="false">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Name" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required="">
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject" required="">
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <button class="theme-btn btn-style-one" type="button" onclick="contact()">
                                        <span class="btn-title">Submit Now</span>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!--End Contact Page Section -->

<!-- Map Section -->
<section class="map-section">
    <div class="auto-container">
        <div class="map-outer">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.8768937627983!2d107.6213646930757!3d-6.905321633156886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e64ace88d69d%3A0x71960e7c7210c965!2sAMWA%20Tours%20%26%20Travel%20(Umrah%20%26%20Hajj%20Special)!5e0!3m2!1sen!2sid!4v1697041143753!5m2!1sen!2sid" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
<!-- End Map Section -->
@endsection
@push('scripts')
<script>
    function contact() {
        $.ajax({
            url: 'https://formsubmit.co/admin@amanahmulia.com',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: $('#contactForm').serialize(),
            beforeSend: function() {
                $('#modal-xl').modal('hide')
                Swal.fire({
                    title: 'Please Wait...',
                    text: 'Your data is being processed!',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                })
            },
            success: function(res) {
                $('#contactForm').trigger("reset");
                Swal.fire({
                    title: 'Action Success!',
                    icon: 'success',
                    text: 'Your Message Has Been Sent',
                    showConfirmButton: true
                })
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('#contactForm').trigger("reset");
                Swal.fire({
                    title: 'Whoopsss....',
                    icon: 'error',
                    text: 'Your Message Has Not Been Sent',
                    showConfirmButton: true
                })
            }
        });
    }
</script>
@endpush
