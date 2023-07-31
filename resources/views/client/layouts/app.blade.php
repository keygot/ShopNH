<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'ShopNH thời trang thượng đỉnh')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/mdb.min.css') }}" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/style.css') }}" />

    @yield('style')
</head>

<body>
    <!--Main Navigation-->
    <header>
        <!-- Jumbotron -->
        <div class="p-3 text-center bg-white border-bottom">
            <div class="container">
                <div class="row gy-3">
                    <!-- Left elements -->
                    <div class="col-lg-2 col-sm-4 col-4">
                        <a href="https://mdbootstrap.com/" target="_blank" class="float-start">
                            <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="35" />
                        </a>
                    </div>
                    <!-- Left elements -->

                    <!-- Center elements -->
                    <div class="order-lg-last col-lg-5 col-sm-8 col-8">
                        <div class="d-flex float-end">
                            @auth
                                <a href="{{ route('client.orders.index') }}"
                                    class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center"> <i
                                        class="fas fa-heart m-1 me-md-2"></i>
                                    <p class="d-none d-md-block mb-0">Đơn hàng</p>
                                </a>
                                <a href="{{ route('client.carts.index') }}"
                                    class=" me-1 border rounded py-1 px-3 nav-link d-flex align-items-center"> <i
                                        class="fas fa-shopping-cart m-1 me-md-2"></i>
                                    <p class="d-none d-md-block mb-0" id="productCountCart">{{ $countProductInCart }}</p>
                                </a>


                                <div class="nav-item dropdown border rounded py-1 px-3 nav-link ">

                                    <a href="" id="navbarDropdown" role="button" data-mdb-toggle="dropdown"
                                        aria-expanded="false" class="nav-link dropdown-toggle d-flex align-items-center">
                                        <i class="fas fa-user-alt m-1 me-md-2"></i>
                                        <p class="d-none d-md-block mb-0">{{ Auth::user()->name }}
                                        </p>
                                    </a>
                                    <!-- Dropdown menu -->
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                        <li>
                                            <a class="dropdown-item" href="#">Trang cá nhân</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('client.orders.index') }}">Đơn hàng của
                                                bạn</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                                {{ __('Đăng xuất') }}</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>


                                        </li>


                                    </ul>
                                </div>
                            @else
                                <a href="{{ route('client.carts.index') }}"
                                    class=" me-1 border rounded py-1 px-3 nav-link d-flex align-items-center"> <i
                                        class="fas fa-shopping-cart m-1 me-md-2"></i>
                                    <p class="d-none d-md-block mb-0" id="productCountCart">{{ $countProductInCart }}</p>
                                </a>
                                <a href="{{ route('login') }}"
                                    class="me-1 border rounded py-1 px-3 nav-link d-flex align-items-center">
                                    <i class="fas fa-user-alt m-1 me-md-2"></i>
                                    <p class="d-none d-md-block mb-0">Đăng nhập</p>
                                </a>
                            @endauth


                        </div>
                    </div>
                    <!-- Center elements -->

                    <!-- Right elements -->
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="input-group float-center">
                            <div class="form-outline">
                                <input type="search" id="form1" class="form-control" />
                                <label class="form-label" for="form1">Tìm kiếm</label>
                            </div>
                            <button type="button" class="btn btn-primary shadow-0">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Right elements -->
                </div>
            </div>
        </div>
        <!-- Jumbotron -->

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <!-- Container wrapper -->
            <div class="container justify-content-center justify-content-md-between">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarLeftAlignExample" aria-controls="navbarLeftAlignExample"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarLeftAlignExample">
                    <!-- Left links -->


                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('client.home') }}">Trang chủ</a>
                        </li>
                        @foreach ($categories as $item)
                            @if ($item->childrens->count() > 0)
                                <!-- Navbar dropdown -->
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle"
                                        href="{{ route('client.products.index', ['category_id' => $item->id]) }}"
                                        id="navbarDropdown" role="button" data-mdb-toggle="dropdown"
                                        aria-expanded="false">
                                        {{ $item->name }}
                                    </a>
                                    <!-- Dropdown menu -->
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($item->childrens as $childCategory)
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ route('client.products.index', ['category_id' => $childCategory->id]) }}">{{ $childCategory->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link"
                                        href="{{ route('client.products.index', ['category_id' => $item->id]) }}">{{ $item->name }}</a>
                                </li>
                            @endif
                        @endforeach

                    </ul>
                    <!-- Left links -->
                </div>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>


    @yield('content')
    <!--  intro  -->

    <!-- intro -->

    <!-- Footer -->
    <footer class="text-center text-lg-start text-muted bg-primary mt-3">
        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start pt-4 pb-4">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-12 col-lg-3 col-sm-12 mb-2">
                        <!-- Content -->
                        <a href="#" target="_blank" class="text-white h2">
                            MDB
                        </a>
                        <p class="mt-1 text-white">
                            © 2023 Copyright: ShopNH
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <!-- Links -->
                        <h6 class="text-uppercase text-white fw-bold mb-2">
                            Cửa hàng
                        </h6>
                        <ul class="list-unstyled mb-4">
                            <li><a class="text-white-50" href="#">Về chúng tôi</a></li>
                            <li><a class="text-white-50" href="#">Bài viết nổi bật</a></li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <!-- Links -->
                        <h6 class="text-uppercase text-white fw-bold mb-2">
                            Thông tin
                        </h6>
                        <ul class="list-unstyled mb-4">
                            <li><a class="text-white-50" href="#">Trung tâm hỗ trợ</a></li>
                            <li><a class="text-white-50" href="#">Hoàn tiền?</a></li>
                            <li><a class="text-white-50" href="#">Thông tin vận chuyển</a></li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <!-- Links -->
                        <h6 class="text-uppercase text-white fw-bold mb-2">
                            Hỗ trợ
                        </h6>
                        <ul class="list-unstyled mb-4">
                            <li><a class="text-white-50" href="#">Trung tâm hỗ trợ</a></li>
                            <li><a class="text-white-50" href="#">Giới thiệu</a></li>
                            <li><a class="text-white-50" href="#">######</a></li>
                            <li><a class="text-white-50" href="#">######</a></a></li>
                        </ul>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-12 col-sm-12 col-lg-3">
                        <!-- Links -->
                        <h6 class="text-uppercase text-white fw-bold mb-2">Liên hệ</h6>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control border" placeholder="Nhập Email của bạn"
                                aria-label="Email" aria-describedby="button-addon2" />
                            <button class="btn btn-light border shadow-0" type="button" id="button-addon2"
                                data-mdb-ripple-color="dark">
                                Gửi
                            </button>
                        </div>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <div class="">
            <div class="container">
                <div class="d-flex justify-content-between py-4 border-top">
                    <!--- payment --->
                    <div>
                        <i class="fab fa-lg fa-cc-visa text-white"></i>
                        <i class="fab fa-lg fa-cc-amex text-white"></i>
                        <i class="fab fa-lg fa-cc-mastercard text-white"></i>
                        <i class="fab fa-lg fa-cc-paypal text-white"></i>
                    </div>
                    <!--- payment --->

                    <!--- language selector --->
                    <div class="dropdown dropup">
                        <a class="dropdown-toggle text-white" href="#" id="Dropdown" role="button"
                            data-mdb-toggle="dropdown" aria-expanded="false"> <i
                                class="flag-united-kingdom flag m-0 me-1"></i>English </a>

                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="Dropdown">
                            <li>
                                <a class="dropdown-item" href="#"><i
                                        class="flag-united-kingdom flag"></i>English <i
                                        class="fa fa-check text-success ms-2"></i></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="flag-poland flag"></i>Polski</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="flag-china flag"></i>中文</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="flag-japan flag"></i>日本語</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="flag-germany flag"></i>Deutsch</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="flag-france flag"></i>Français</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="flag-spain flag"></i>Español</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i class="flag-russia flag"></i>Русский</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#"><i
                                        class="flag-portugal flag"></i>Português</a>
                            </li>
                        </ul>
                    </div>
                    <!--- language selector --->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->
    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('client/assets/js/mdb.min.js') }}"></script>
    <!-- Custom scripts -->
    <script type="text/javascript" src="{{ asset('client/assets/js/script.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @yield('script')


</body>

</html>
