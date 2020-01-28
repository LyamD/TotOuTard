<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id='app'>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                    aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#projects">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <footer class="site-footer" role="contentinfo">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-4 mb-5">
                        <h3>About Us</h3>
                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus et dolor
                            blanditiis consequuntur ex voluptates perspiciatis omnis unde minima expedita.</p>
                        <ul class="list-unstyled footer-link d-flex footer-social">
                            <li><a href="#" class="p-2"><span class="fa fa-twitter"></span></a></li>
                            <li><a href="#" class="p-2"><span class="fa fa-facebook"></span></a></li>
                            <li><a href="#" class="p-2"><span class="fa fa-linkedin"></span></a></li>
                            <li><a href="#" class="p-2"><span class="fa fa-instagram"></span></a></li>
                        </ul>

                    </div>
                    <div class="col-md-5 mb-5">
                        <div class="mb-5">
                            <h3>Opening Hours</h3>
                            <p><strong class="d-block font-weight-normal text-black">Sunday-Thursday</strong> 5AM - 10PM
                            </p>
                        </div>
                        <div>
                            <h3>Contact Info</h3>
                            <ul class="list-unstyled footer-link">
                                <li class="d-block">
                                    <span class="d-block text-black">Address:</span>
                                    <span>34 Street Name, City Name Here, United States</span></li>
                                <li class="d-block"><span class="d-block text-black">Phone:</span><span>+1 242 4942
                                        290</span></li>
                                <li class="d-block"><span
                                        class="d-block text-black">Email:</span><span>info@yourdomain.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 mb-5">
                        <h3>Quick Links</h3>
                        <ul class="list-unstyled footer-link">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Disclaimers</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-md-center text-left">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i
                                class="fa fa-heart text-danger" aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</body>

</html>