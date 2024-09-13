<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sunderif</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="keywords" />
        <meta content="" name="description" />

        <!-- Favicon -->

        <link href="../img/bread.png" rel="icon" />

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
        <link href="../lib/animate/animate.min.css" rel="stylesheet" />
        <link
            href="../lib/owlcarousel/assets/owl.carousel.min.css"
            rel="stylesheet"
        />

        <!-- Customized Bootstrap Stylesheet -->
        <link href="../css/bootstrap.min.css" rel="stylesheet" />

        <!-- Template Stylesheet -->
        <link href="../css/style.css" rel="stylesheet" />
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
            <a href="admin-index" class="navbar-brand ms-4 ms-lg-0">
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

                    <a href="/admin-index" class="nav-item nav-link active">Home</a>
                    <a href="/about" class="nav-item nav-link">About</a>
                    <a href="/admin/products/index" class="nav-item nav-link">Products</a>
                    <a href="/admin-Bakingschool"class="nav-item nav-link">Baking school</a>
                    <a href="/admin-place" class="nav-item nav-link ">Place Reservation</a>
                    <!--<a  href="/auth/login" class="nav-item nav-link "><i class="bi bi-person"></i></a>-->
                    <!--<a  href="/cart" class="nav-item nav-link "><i class="bi bi-cart"></i></a>-->
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

        <main class="py-4">
            @yield('content')
        </main>
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
                <a class="btn btn-link" href="/admin-index">Home page</a>
            </div>

            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Photo Gallery</h4>
                <div class="row g-2">
                    <div class="col-4">
                        <img class="img-fluid bg-light rounded p-1" src="../img/product-1.jpg" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light rounded p-1" src="../img/product-2.jpg" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light rounded p-1" src="../img/product-3.jpg" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light rounded p-1" src="../img/product-2.jpg" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light rounded p-1" src="../img/product-3.jpg" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid bg-light rounded p-1" src="../img/product-1.jpg" alt="Image">
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
                &copy; <a href="/admin-index">Sunderif</a>, All Right Reserved.
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
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>
</html>
