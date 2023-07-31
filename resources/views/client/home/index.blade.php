@extends('client.layouts.app')
@section('title')

@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/slide.css') }}">
@endsection

@section('content')
    <section class="pt-3">
        <div class="container">
            <div class="row gx-3">
                <main class="col-lg-9" style="height: 350px">
                    <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide" style="width: 100%;">
                                    <img src="{{asset('upload/slide-01.jpg')}}" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('upload/slide-02.jpg')}}" alt="">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('upload/slide-03.jpg')}}" alt="">

                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('upload/slide-04.jpg')}}" alt="">

                                </div>
                                <div class="swiper-slide">
                                    <img src="{{asset('upload/slide-05.jpg')}}" alt="">
                                    
                                </div>
                            
                            
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination"></div>
                    </div>
                </main>
                <aside class="col-lg-3">
                    <div class="card-banner h-100 rounded-5" style="background-color: #f87217;">
                        <div class="card-body text-center pb-5">
                            <h5 class="pt-5 text-white">Amazing Gifts</h5>
                            <p class="text-white">No matter how far along you are in your sophistication</p>
                            <a href="#" class="btn btn-outline-light"> View more </a>
                        </div>
                    </div>
                </aside>
            </div>
            <!-- row //end -->
        </div>
        <!-- container end.// -->
    </section>

    <!-- Products -->
    <section>
        <div class="container my-5">
            <header class="mb-4">
                <h3>Sản phẩm</h3>
            </header>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="card my-2 shadow-0">
                            <a href="#" class="img-wrap">
                                <img src="{{ $product->images ? asset('upload/' . $product->images->url) : 'upload/default.jpg' }}"
                                    class="card-img-top" style="aspect-ratio: 1 / 1">
                            </a>
                            <div class="card-body p-0 pt-2">
                                <a href="{{ route('client.products.show', $product->id) }}"
                                    class="btn btn-light border px-2 pt-2 float-end icon-hover"><i
                                        class="fas fa-eye fa-lg px-1 text-secondary"></i>Chi tiết</a>
                                <h5 class="card-title">${{ $product->price }}</h5>
                                <p class="card-text mb-0">{{ $product->name }}</p>
                                <p class="text-muted">
                                    Capacity: 128GB
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>




            <!-- Pagination -->
            <nav aria-label="Page navigation example" class="d-flex justify-content-center mt-3">
                {{ $products->links('pagination::bootstrap-4') }}
            </nav>
            <!-- Pagination -->
        </div>
    </section>
    <!-- Products -->

    <!-- Feature -->
    <section class="">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="card-banner bg-gray h-100"
                        style="
                                                  min-height: 200px;
                                                  background-size: cover;
                                                  background-position: center;
                                                  width: 100%;
                                                  background-repeat: no-repeat;
                                                  top: 50%;
                                                  background-image: url('https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/banners/banner-item2.webp');">
                        <div class="p-3 p-lg-5" style="max-width: 70%;">
                            <h3 class="text-dark">Best products & brands in our store at 80% off</h3>
                            <p>That's true but not always</p>
                            <button class="btn btn-warning shadow-0" href="#"> Claim offer </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row mb-3 mb-sm-4 g-3 g-sm-4">
                        <div class="col-6 d-flex">
                            <div class="card w-100 bg-primary" style="min-height: 200px;">
                                <div class="card-body">
                                    <h5 class="text-white">Gaming toolset</h5>
                                    <p class="text-white-50">Technology for cyber sport</p>
                                    <a class="btn btn-outline-light btn-sm" href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-flex">
                            <div class="card w-100 bg-primary" style="min-height: 200px;">
                                <div class="card-body">
                                    <h5 class="text-white">Quality sound</h5>
                                    <p class="text-white-50">All you need for music</p>
                                    <a class="btn btn-outline-light btn-sm" href="#">Learn more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row.// -->

                    <div class="card bg-success" style="min-height: 200px;">
                        <div class="card-body">
                            <h5 class="text-white">Buy 2 items, With special gift</h5>
                            <p class="text-white-50" style="max-width: 400px;">Buy one, get one free marketing
                                strategy helps your business improves the brand by sharing the profits</p>
                            <a class="btn btn-outline-light btn-sm" href="#">Learn more</a>
                        </div>
                    </div>
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->
        </div>
        <!-- container end.// -->
    </section>
    <!-- Feature -->

    <!-- Recently viewed -->
    <section class="mt-5 mb-4">
        <div class="container text-dark">
            <header class="">
                <h3 class="section-title">Sản phẩm nổi bật</h3>
            </header>

            <div class="row gy-3">
                <div class="col-lg-2 col-md-4 col-4">
                    <a href="#" class="img-wrap">
                        <img height="200" width="200" class="img-thumbnail"
                            src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/1.webp" />
                    </a>
                </div>
                <!-- col.// -->
                <div class="col-lg-2 col-md-4 col-4">
                    <a href="#" class="img-wrap">
                        <img height="200" width="200" class="img-thumbnail"
                            src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/2.webp" />
                    </a>
                </div>
                <!-- col.// -->
                <div class="col-lg-2 col-md-4 col-4">
                    <a href="#" class="img-wrap">
                        <img height="200" width="200" class="img-thumbnail"
                            src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/3.webp" />
                    </a>
                </div>
                <!-- col.// -->
                <div class="col-lg-2 col-md-4 col-4">
                    <a href="#" class="img-wrap">
                        <img height="200" width="200" class="img-thumbnail"
                            src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/4.webp" />
                    </a>
                </div>
                <!-- col.// -->
                <div class="col-lg-2 col-md-4 col-4">
                    <a href="#" class="img-wrap">
                        <img height="200" width="200" class="img-thumbnail"
                            src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/5.webp" />
                    </a>
                </div>
                <!-- col.// -->
                <div class="col-lg-2 col-md-4 col-4">
                    <a href="#" class="img-wrap">
                        <img height="200" width="200" class="img-thumbnail"
                            src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/6.webp" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Recently viewed -->

    <section>
        <div class="container">
            <div class="px-4 pt-3 border">
                <div class="row pt-1">
                    <div class="col-lg-3 col-md-6 mb-3 d-flex">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-warning p-2 rounded-4 me-3">
                                <i class="fas fa-thumbs-up fa-2x fa-fw"></i>
                            </div>
                            <span class="info">
                                <h6 class="title">ShopNH</h6>
                                <p class="mb-0">Giá cả hợp lý</p>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 d-flex">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-warning p-2 rounded-4 me-3">
                                <i class="fas fa-plane fa-2x fa-fw"></i>
                            </div>
                            <span class="info">
                                <h6 class="title">Giao hàng toàn quốc</h6>
                                <p class="mb-0">Miễn phí giao hàng khi có mã?</p>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 d-flex">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-warning p-2 rounded-4 me-3">
                                <i class="fas fa-star fa-2x fa-fw"></i>
                            </div>
                            <span class="info">
                                <h6 class="title">Xếp hạng</h6>
                                <p class="mb-0">Top 7 tỉ </p>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-3 d-flex">
                        <div class="d-flex align-items-center">
                            <div class="badge badge-warning p-2 rounded-4 me-3">
                                <i class="fas fa-phone-alt fa-2x fa-fw"></i>
                            </div>
                            <span class="info">
                                <h6 class="title">Liên hệ</h6>
                                <p class="mb-0">0396864747</p>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            cssMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            mousewheel: true,
            keyboard: true,
            autoplay: {
                delay: 3000, // Đặt thời gian chuyển slide tự động (đơn vị là mili giây)
            },
        });
    </script>
@endsection

