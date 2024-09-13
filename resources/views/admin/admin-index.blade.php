
        @extends('../../layouts.layouts-admin')

        @section('content')
        <div class="container-xxl py-6">
            <div class="container">
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
                        <p class="mb-2">Total Products</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">
                            {{$product}}
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
                        <p class="mb-2">Total Baking School Classes</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">
                            {{$classes}}
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
                        <p class="mb-2">Total Reservations</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">
                            {{$reservations}}
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
                        <p class="mb-2">Total Products Sales</p>
                        <h1 class="display-5 mb-0" data-toggle="counter-up">
                            {{$sales}}
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->

            </div>
        </div>
@endsection
