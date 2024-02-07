<script src="{{asset('templates/landing/js/jquery.js')}}"></script>
<script src="{{asset('templates/landing/js/popper.min.js')}}"></script>
<script src="{{asset('templates/landing/js/bootstrap.min.js')}}"></script>
<script src="{{asset('templates/landing/js/jquery-ui.js')}}"></script>
<script src="{{asset('templates/landing/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('templates/landing/js/jquery.countdown.js')}}"></script>
<script src="{{asset('templates/landing/js/appear.js')}}"></script>
<script src="{{asset('templates/landing/js/owl.js')}}"></script>
<script src="{{asset('templates/landing/js/wow.js')}}"></script>
<script src="{{asset('templates/landing/js/parallax.min.js')}}"></script>
<script src="{{asset('templates/landing/js/script.js')}}"></script>
<script src="https://kit.fontawesome.com/69eae326e3.js" crossorigin="anonymous"></script>
<!-- Color Setting -->
<script src="{{asset('templates/landing/js/color-settings.js')}}"></script>
{{-- Swal --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- End Swal --}}

<!-- NAVBAR MENU -->
<script>
    var currentRoute = "{{ Route::currentRouteName() }}";

    var routes = {
        'home': "{{ route('home') }}",
        'profil': "{{route('profil')}}",
        'contact': "{{ route('contact') }}",
        'umrah':"{{route('umrah')}}",
        'haji':"{{route('haji')}}",
        'gallery':"{{route('gallery')}}"
    };

    var menuItems = document.querySelectorAll('.main-menu .navigation > li');

    menuItems.forEach(function(item) {
        var anchorTag = item.querySelector('a');
        if (currentRoute === 'home') {
            anchorTag.style.color = '#fefefe';
        } else {
            anchorTag.style.color = '#3f4161';
        }

        if (anchorTag.getAttribute('href') === routes[currentRoute]) {
            item.classList.add('current');
        }

        if ((currentRoute === 'profil' || currentRoute === 'contact') && item.classList.contains('dropdown')) {
            item.classList.add('current');
        }
    });

    function handleScroll() {
        if (currentRoute === 'home') {
            var scrollPosition = window.scrollY;
            if (scrollPosition > 0) {
                menuItems.forEach(function(item) {
                    var anchorTag = item.querySelector('a');
                    anchorTag.style.color = '#3f4161';
                });
            } else {
                menuItems.forEach(function(item) {
                    var anchorTag = item.querySelector('a');
                    anchorTag.style.color = '#fefefe';
                });
            }
        }
    }

    window.addEventListener('scroll', handleScroll);
</script>
