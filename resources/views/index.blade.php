<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sunderif</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="keywords" />
        <meta content="" name="description" />
<!-- first commit -->
        <!-- Favicon -->

        <link href="img/bread.png" rel="icon" />

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Playfair+Display:wght@600;700&display=swap"rel="stylesheet"/>

        <!-- Icon Font Stylesheet -->
        <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
            rel="stylesheet"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
            rel="stylesheet"
        />

        <!-- Libraries Stylesheet -->
        <link href="lib/animate/animate.min.css" rel="stylesheet" />
        <link
            href="lib/owlcarousel/assets/owl.carousel.min.css"
            rel="stylesheet"
        />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet" />
    </head>

    <body>



        <!-- Spinner Start -->
        <div
            id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
        >
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <div
            class="container-fluid top-bar bg-dark text-light px-0 wow fadeIn"
            data-wow-delay="0.1s"
        >
            <div class="row gx-0 align-items-center d-none d-lg-flex">
                <div class="col-lg-6 px-5 text-start">

                </div>
                <div class="col-lg-6 px-5 text-end">
                    <small>Follow us:</small>
                    <div class="h-100 d-inline-flex align-items-center">
                        <a
                            class="btn-lg-square text-primary border-end rounded-0"
                            href=""
                            ><i class="fab fa-facebook-f"></i
                        ></a>
                        <a
                            class="btn-lg-square text-primary border-end rounded-0"
                            href=""
                            ><i class="fab fa-twitter"></i
                        ></a>
                        <a
                            class="btn-lg-square text-primary border-end rounded-0"
                            href=""
                            ><i class="fab fa-linkedin-in"></i
                        ></a>
                        <a class="btn-lg-square text-primary pe-0" href=""
                            ><i class="fab fa-instagram"></i
                        ></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <nav
            class="navbar navbar-expand-lg navbar-dark fixed-top py-lg-0 px-lg-5 wow fadeIn"
            data-wow-delay="0.1s"
        >
            <a href="index" class="navbar-brand ms-4 ms-lg-0">
                <h1 class="text-primary m-0">Sunderif</h1>
            </a>
            <button
                type="button"
                class="navbar-toggler me-4"
                data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto p-4 p-lg-0">
                    <a href="/index" class="nav-item nav-link active">Home</a>
                    <a href="/about" class="nav-item nav-link">About</a>
                    <a href="/product" class="nav-item nav-link">Products</a>
                    <a href="/paidproduct" class="nav-item nav-link">Paid products</a>
                    <a href="/Bakingschool"class="nav-item nav-link">Baking school</a>
                    <a href="/place" class="nav-item nav-link ">Place Reservation</a>
                    <!--<a  href="/auth/login" class="nav-item nav-link "><i class="bi bi-person"></i></a>-->
                    <div class="nav-item dropdown">
                        <a  href="/cart" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="bi bi-cart"></i>
                            <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        </a>
                        <div class="dropdown-menu" style="min-width:25rem">
                                <div class="row total-header-section" align="center">

                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p>Total: <span class="text-info"> {{ $total }} MAD</span></p>
                                    </div>
                                </div>
                                @if(session('cart'))
                                    @foreach(session('cart') as $id => $details)
                                        <div class="row cart-detail">
                                            <div class="col-lg-4 col-sm-4 col-4 cart-detail-img"  >
                                                <img class="col-12" style="margin-left:10px"  src="{{ $details['image'] }}" />
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                <p>{{ $details['name_product'] }}</p>
                                                <span class="price text-info"> ${{ $details['price'] }}</span>  <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                                    </div>
                                </div>
                        </div>
                    </div>
<!-- Authentication Links -->
@guest
@if (Route::has('login'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
@endif

@if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
@endif
@else
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>

    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>
@endguest



                </div>
                <div class="d-none d-lg-flex">
                    <div
                        class="flex-shrink-0 btn-lg-square border border-light rounded-circle"
                    >
                        <i class="fa fa-phone text-primary"></i>
                    </div>
                    <div class="ps-3">
                        <small class="text-primary mb-0">Call Us</small>
                        <p class="text-light fs-5 mb-0">+212 611111111</p>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Carousel Start -->
        <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-1.jpg" alt="" />
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8">
                                    <p
                                        class="text-primary text-uppercase fw-bold mb-2"
                                    >
                                        // The Best Bakery
                                    </p>
                                    <h1
                                        class="display-1 text-light mb-4 animated slideInDown"
                                    >
                                        We Bake With Passion
                                    </h1>
                                    <p class="text-light fs-5 mb-4 pb-3">
                                        The perfect place to buy your everyday homemade traditional Moroccan bakery.
                                    </p>
                                    <a
                                        href="/about"
                                        class="btn btn-primary rounded-pill py-3 px-5"
                                        >Read More</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/carousel-2.jpg" alt="" />
                    <div class="owl-carousel-inner">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-8">
                                    <p
                                        class="text-primary text-uppercase fw-bold mb-2"
                                    >
                                        // The Best Bakery
                                    </p>
                                    <h1
                                        class="display-1 text-light mb-4 animated slideInDown"
                                    >
                                        We Bake With Passion
                                    </h1>
                                    <p class="text-light fs-5 mb-4 pb-3">
                                        The perfect place to buy your everyday homemade traditional Moroccan bakery.
                                    </p>
                                    <a
                                        href="/about"
                                        class="btn btn-primary rounded-pill py-3 px-5"
                                        >Read More</a
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->

        <!-- Facts Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div class="row g-4">
                    <div
                        class="col-lg-3 col-md-6 wow fadeIn"
                        data-wow-delay="0.1s"
                    >
                        <div
                            class="fact-item bg-light rounded text-center h-100 p-5"
                        >
                            <i
                                class="fa fa-certificate fa-4x text-primary mb-4"
                            ></i>
                            <p class="mb-2">Years Experience</p>
                            <h1 class="display-5 mb-0" data-toggle="counter-up">
                                50
                            </h1>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 wow fadeIn"
                        data-wow-delay="0.3s"
                    >
                        <div
                            class="fact-item bg-light rounded text-center h-100 p-5"
                        >
                            <i class="fa fa-users fa-4x text-primary mb-4"></i>
                            <p class="mb-2">Skilled Professionals</p>
                            <h1 class="display-5 mb-0" data-toggle="counter-up">
                                4
                            </h1>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 wow fadeIn"
                        data-wow-delay="0.5s"
                    >
                        <div
                            class="fact-item bg-light rounded text-center h-100 p-5"
                        >
                            <i
                                class="fa fa-bread-slice fa-4x text-primary mb-4"
                            ></i>
                            <p class="mb-2">Total Products</p>
                            <h1 class="display-5 mb-0" data-toggle="counter-up">
                                6
                            </h1>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 wow fadeIn"
                        data-wow-delay="0.7s"
                    >
                        <div
                            class="fact-item bg-light rounded text-center h-100 p-5"
                        >
                            <i
                                class="fa fa-cart-plus fa-4x text-primary mb-4"
                            ></i>
                            <p class="mb-2">Order Everyday</p>
                            <h1 class="display-5 mb-0" data-toggle="counter-up">
                                50
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Facts End -->



        



        <!-- Team Start -->
        <div class="container-xxl py-6">
            <div class="container">
                <div
                    class="text-center mx-auto mb-5 wow fadeInUp"
                    data-wow-delay="0.1s"
                    style="max-width: 500px"
                >
                    <p class="text-primary text-uppercase mb-2">// Our Team</p>
                    <h1 class="display-6 mb-4">
                        We're Super Professional At Our Skills
                    </h1>
                </div>
                <div class="row g-4">
                    <div
                        class="col-lg-3 col-md-6 wow fadeInUp"
                        data-wow-delay="0.1s"
                    >
                        <div
                            class="team-item text-center rounded overflow-hidden"
                        >
                            <img
                                class="img-fluid"
                                src="img/team-1.jpg"
                                alt=""
                            />
                            <div class="team-text">
                                <div class="team-title">
                                    <h5>Ali</h5>
                                    <span>Bread</span>
                                </div>
                                <div class="team-social">
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-instagram"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 wow fadeInUp"
                        data-wow-delay="0.3s"
                    >
                        <div
                            class="team-item text-center rounded overflow-hidden"
                        >
                            <img
                                class="img-fluid"
                                src="img/team-2.jpg"
                                alt=""
                            />
                            <div class="team-text">
                                <div class="team-title">
                                    <h5>Youssef</h5>
                                    <span>Cookies</span>
                                </div>
                                <div class="team-social">
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-instagram"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 wow fadeInUp"
                        data-wow-delay="0.5s"
                    >
                        <div
                            class="team-item text-center rounded overflow-hidden"
                        >
                            <img
                                class="img-fluid"
                                src="img/team-3.jpg"
                                alt=""
                            />
                            <div class="team-text">
                                <div class="team-title">
                                    <h5>Hamza</h5>
                                    <span>Bread</span>
                                </div>
                                <div class="team-social">
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-instagram"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-6 wow fadeInUp"
                        data-wow-delay="0.7s"
                    >
                        <div
                            class="team-item text-center rounded overflow-hidden"
                        >
                            <img
                                class="img-fluid"
                                src="img/team-4.jpg"
                                alt=""
                            />
                            <div class="team-text">
                                <div class="team-title">
                                    <h5>Aymane</h5>
                                    <span>Cake</span>
                                </div>
                                <div class="team-social">
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-facebook-f"></i
                                    ></a>
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-twitter"></i
                                    ></a>
                                    <a
                                        class="btn btn-square btn-light rounded-circle"
                                        href=""
                                        ><i class="fab fa-instagram"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team End -->

        <div class="container-xxl bg-light my-6 py-6 pb-0">
            <div class="container">
                <div
                    class="text-center mx-auto mb-5 wow fadeInUp"
                    data-wow-delay="0.1s"
                    style="max-width: 500px"
                >
                    <p class="text-primary text-uppercase mb-2">
                        // Client's Review
                    </p>
                    <h1 class="display-6 mb-4">
                        More Than 100+ Customers Trusted Us
                    </h1>
                </div>
                <div
                    class="owl-carousel testimonial-carousel wow fadeInUp"
                    data-wow-delay="0.1s"
                >
                    <div class="testimonial-item bg-white rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img
                                class="flex-shrink-0 rounded-circle border p-1"
                                src="img/testimonial-1.jpg"
                                alt=""
                            />
                            <div class="ms-4">
                                <h5 class="mb-1">Hajar</h5>
                                <span>Teacher</span>
                            </div>
                        </div>
                        <p class="mb-0">
                            The apple cake was amazing. 
                            Please send my sincere thanks to its makers. The work was truly admired and appreciated.
                        </p>
                    </div>
                    <div class="testimonial-item bg-white rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img
                                class="flex-shrink-0 rounded-circle border p-1"
                                src="img/testimonial-2.jpg"
                                alt=""
                            />
                            <div class="ms-4">
                                <h5 class="mb-1">Ahmed</h5>
                                <span>Banker</span>
                            </div>
                        </div>
                        <p class="mb-0">
                            I always find myself coming back to buy more pastry, it is honestly the best and it tastes as good as the ones my mom used to bake.
                        </p>
                    </div>
                    <div class="testimonial-item bg-white rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img
                                class="flex-shrink-0 rounded-circle border p-1"
                                src="img/testimonial-3.jpg"
                                alt=""
                            />
                            <div class="ms-4">
                                <h5 class="mb-1">Bilal</h5>
                                <span>Journalist</span>
                            </div>
                        </div>
                        <p class="mb-0">
                            The bread made in Sunderif is really delicious, I highly recommend it to everyone who likes traditional bread, I personally order it everyday for my breakfast and it tastes perfect everyday.
                        </p>
                    </div>
                    <div class="testimonial-item bg-white rounded p-4">
                        <div class="d-flex align-items-center mb-4">
                            <img
                                class="flex-shrink-0 rounded-circle border p-1"
                                src="img/testimonial-4.jpg"
                                alt=""
                            />
                            <div class="ms-4">
                                <h5 class="mb-1">Sarah</h5>
                                <span>Flower shop owner</span>
                            </div>
                        </div>
                        <p class="mb-0">
                            I would like to say thank you so much for the bread it was absolutely beautiful! 
                            We loved it and it also tasted delicious thank you!
                        </p>
                    </div>
                </div>
               
                </div>
            </div>
        </div>
        </div>
        <!-- Testimonial End -->

            <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer my-6 mb-0 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Office Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>agdal, rabat, morocco</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+212 611111111</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@gmail.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="/about">About Us</a>
                    <a class="btn btn-link" href="/index">Home page</a>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Photo Gallery</h4>
                    <div class="row g-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-1.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-2.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-3.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-2.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-3.jpg" alt="Image">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light rounded p-1" src="img/product-1.jpg" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright text-light py-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="/index">Sunderif</a>, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->

        <!-- Back to Top -->
        <a
            href="#"
            class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"
            ><i class="bi bi-arrow-up"></i
        ></a>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/wow/wow.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/counterup/counterup.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>

