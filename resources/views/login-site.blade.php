<!DOCTYPE html><html lang="pt-br"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/favicon.png">
    <title>Home - LPR Saúde</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/line-awesome.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- loader -->
<div class="loader">
    <div class="loading">
        <div class="spinner-grow aloader" role="status">
            <span class="sr-only"></span>
        </div>
    </div>
</div>
<!-- end loader -->


<!-- navbar -->
<div id="navbar" class="navbar navbar-expand-lg">
    <div class="container">
        <a href="#" class="navbar-brand">LPR Saúde<span>.</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="la la-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">Bio</a></li>
                <li class="nav-item"><a class="nav-link" href="#project">Produções</a></li>
                <li class="nav-item"><a class="nav-link" href="#testimonial">Histórias</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Contato</a></li>
                <li class="nav-item"><a href="/login" class="button"><i class="la la-user"></i> Área do Paciente</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- end navbar -->



<!-- services -->
<div id="services" class="services text-center">
    <div class="container">
        <div class="title">
            <h5>Área do paciente</h5>

        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="content content-center">
                    <h5>Login</h5>
                    <br>
                    @include('blocks.alerts')

                    <form method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="E-mail" name="email">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Senha" name="password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Manter conectado
                            </label>
                        </div>
                        <button class="button shadow-lg mt-5" type="submit">Acessar</button>
                        <a class="font-bold" href="/forgot-password">Esqueceu a senha?</a>

                    </form>


                </div>
            </div>
            <div class="col-md-4">
                <div class="content">
                    <i class="la la-bullhorn"></i>
                    <h5>Cadastro</h5>
                    <p class="text-gray-600"><a href="/register" class="font-bold">Cadastre-se</a>.</p>
                    <p><a class="font-bold" href="/forgot-password">Esqueceu a senha?</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end services -->

<!-- portfolio
<div id="project" class="portfolio">
    <div class="container">
        <div class="title text-center">
            <h5>Portfolio</h5>
            <h2>See our awesome done project</h2>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="img/portfolio1.jpg" class="popup-image"><img src="images/portfolio1.jpg" alt=""></a>
                <div class="text">
                    <h5>Design Art</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                </div>
            </div>
            <div class="col-md-6">
                <a href="img/portfolio2.jpg" class="popup-image"><img src="images/portfolio2.jpg" alt=""></a>
                <div class="text">
                    <h5>Marketing</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a href="img/portfolio3.jpg" class="popup-image"><img src="images/portfolio3.jpg" alt=""></a>
                <div class="text shadow-2xl">
                    <h5>Creative Design</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                </div>
            </div>
            <div class="col-md-6">
                <a href="img/portfolio4.jpg" class="popup-image"><img src="images/portfolio4.jpg" alt=""></a>
                <div class="text shadow-2xl">
                    <h5>Programming</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end portfolio -->

<!-- pricing
<div id="pricing" class="pricing">
    <div class="container">
        <div class="title">
            <h5>Pricing</h5>
            <h2>Choose our pricing</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="content shadow">
                    <h5>Design</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <h2>$89</h2>
                    <div class="divider"></div>
                    <ul>
                        <li><i class="la la-check"></i> Free Support</li>
                        <li><i class="la la-check"></i> Update</li>
                        <li><i class="la la-check"></i> Revision</li>
                        <li><i class="la la-check"></i> Unlimited</li>
                    </ul>
                    <button class="button">Get Started</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content shadow content-center">
                    <h5>Programming</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <h2>$99</h2>
                    <div class="divider"></div>
                    <ul>
                        <li><i class="la la-check"></i> Free Support</li>
                        <li><i class="la la-check"></i> Update</li>
                        <li><i class="la la-check"></i> Revision</li>
                        <li><i class="la la-check"></i> Unlimited</li>
                    </ul>
                    <button class="button">Get Started</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="content shadow">
                    <h5>Marketing</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    <h2>$69</h2>
                    <div class="divider"></div>
                    <ul>
                        <li><i class="la la-check"></i> Free Support</li>
                        <li><i class="la la-check"></i> Update</li>
                        <li><i class="la la-check"></i> Revision</li>
                        <li><i class="la la-check"></i> Unlimited</li>
                    </ul>
                    <button class="button">Get Started</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end pricing -->

<!-- testimonial
<div id="testimonial" class="testimonial">
    <div class="container">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="content shadow-2xl">
                        <p>Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Voluptas quis vel asperiores incidunt illum placeat ab, ex iste reprehenderit ipsa commodi reiciendis</p>
                        <div class="icon">
                            <i class="las la-quote-right"></i>
                        </div>
                        <div class="text">
                            <h5>John Doe</h5>
                            <span>Directur</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content shadow-2xl">
                        <p>Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Voluptas quis vel asperiores incidunt illum placeat ab, ex iste reprehenderit ipsa commodi reiciendis</p>
                        <div class="icon">
                            <i class="las la-quote-right"></i>
                        </div>
                        <div class="text">
                            <h5>Mario</h5>
                            <span>Marketing</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content shadow-2xl">
                        <p>Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Voluptas quis vel asperiores incidunt illum placeat ab, ex iste reprehenderit ipsa commodi reiciendis</p>
                        <div class="icon">
                            <i class="las la-quote-right"></i>
                        </div>
                        <div class="text">
                            <h5>Wesley</h5>
                            <span>Programming</span>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="content shadow-2xl">
                        <p>Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Voluptas quis vel asperiores incidunt illum placeat ab, ex iste reprehenderit ipsa commodi reiciendis</p>
                        <div class="icon">
                            <i class="las la-quote-right"></i>
                        </div>
                        <div class="text">
                            <h5>Rami</h5>
                            <span>Designer</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 end testimonial -->

<!-- Start Footer Area -->
<section class="footer-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <a class="footer-logo" href="#">
                        <img src="images/logo.png" class="white-logo" alt="logo">
                    </a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco consectetur.</p>
                    <ul class="footer-social">
                        <li>
                            <a href="#"> <i class="la la-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg></a>
                        </li>
                        <li>
                            <a href="#"> <i class="la la-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"> <i class="la la-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="single-footer-widget">
                    <div class="footer-heading">
                        <h3>Our Services</h3>
                    </div>
                    <ul class="footer-quick-links">
                        <li><a href="#">Graphic Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Digital Marketing</a></li>
                        <li><a href="#">SEO Optimization</a></li>
                        <li><a href="#">Creative Solutions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="single-footer-widget">
                    <div class="footer-heading">
                        <h3>Useful Links</h3>
                    </div>
                    <ul class="footer-quick-links">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="projects.html">Case Study</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="terms-condition.html">Terms &amp; Conditions</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-footer-widget">
                    <div class="footer-heading">
                        <h3>Contact Info</h3>
                    </div>
                    <div class="footer-info-contact"> <i class="la la-whatsapp"></i>
                        <h3>Phone</h3>
                        <span><a href="tel:0802235678">080 707 555-321</a></span>
                    </div>
                    <div class="footer-info-contact"> <i class="la la-envelope"></i>
                        <h3>Email</h3>
                        <span><a href="mailto:demo@example.com">demo@example.com</a></span>
                    </div>
                    <div class="footer-info-contact"> <i class="la la-home"></i>
                        <h3>Address</h3>
                        <span>526  Melrose Street, Water Mill, 11976  New York</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Footer Section -->
<!-- Start Copy Right Section -->
<div class="copyright-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
                <p> <i class="la la-copyright"></i> 2024 Adautopro - All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 col-md-6">
                <ul>
                    <li> <a href="terms-condition.html">Terms &amp; Conditions</a></li>
                    <li> <a href="privacy-policy.html">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Copy Right Section -->


<!-- script -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/main.js"></script>



</body></html>
