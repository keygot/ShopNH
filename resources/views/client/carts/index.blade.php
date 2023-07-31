@extends('client.layouts.app')
@section('title', 'Giỏ hàng của bạn')
@section('content')
    <!-- cart + summary -->
    <section class="bg-light my-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-0">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Giỏ hàng của bạn</h4>

                            @foreach ($cart->products as $item)
                                <div class="row gy-3 mb-4" id="row-{{ $item->id }}">
                                    <div class="col-lg-5">
                                        <div class="me-lg-5">
                                            <div class="d-flex">
                                                <img src="{{ $item->product->image_path }}" class="border rounded me-3"
                                                    style="width: 96px; height: 96px;" />
                                                <div class="">
                                                    <a href="#" class="nav-link">{{ $item->product->name }}</a>
                                                    <p class="text-muted">Vàng, Jeans</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-2 col-sm-6 col-6 d-flex flex-row flex-lg-column align-items-center flex-xl-row text-nowrap">
                                        <div class="" style="margin-right: 30px">
                                            <div class="input-group mb-3" style="width: 170px;">
                                                <button
                                                    class="btn btn-white border border-secondary px-3 btn-update-quantity"
                                                    type="button" id="button-addon1" data-mdb-ripple-color="dark"
                                                    fdprocessedid="kv109o" data-id="{{ $item->id }}"
                                                    data-action="{{ route('client.carts.update_product_quantity', $item->id) }}">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <input type="text"
                                                    class="form-control text-center border border-secondary"
                                                    id="productQuantityInput-{{ $item->id }}" min="1"
                                                    value="{{ $item->product_quantity }}"
                                                    aria-label="Example text with button addon"
                                                    aria-describedby="button-addon1" name="product_quantity"
                                                    fdprocessedid="hlyrle">
                                                <button
                                                    class="btn btn-white border border-secondary px-3 btn-update-quantity"
                                                    type="button" id="button-addon2" data-mdb-ripple-color="dark"
                                                    fdprocessedid="htunk" data-id="{{ $item->id }}"
                                                    data-action="{{ route('client.carts.update_product_quantity', $item->id) }}">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="">
                                            <text class="h6"
                                                id="cartProductPrice{{ $item->id }}">${{ $item->product->sale ? $item->product->sale_price * $item->product_quantity : $item->product->price * $item->product_quantity }}</text>
                                            <br />
                                            <small class="text-muted text-nowrap" style="text-decoration: line-through;">
                                                ${{ $item->product->sale }}</small> <small>/ sản phẩm </small>
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg col-sm-6 d-flex justify-content-sm-center align-items-center justify-content-md-start justify-content-lg-center justify-content-xl-end mb-2">
                                        <div class="float-md-end">
                                            <a href="#!" class="btn btn-light border px-2 icon-hover-primary"><i
                                                    class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
                                            <button
                                                data-action="{{ route('client.carts.remove_product_in_cart', $item->id) }}"
                                                class="btn btn-light border text-danger icon-hover-danger btn-remove-product">
                                                Xóa</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="border-top pt-4 mx-4 mb-4">
                            <p><i class="fas fa-truck text-muted fa-lg"></i>Giao hàng miễn phí trong vòng 5 - 7 ngày</p>
                            <p class="text-muted">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut
                                aliquip
                            </p>
                        </div>
                    </div>
                </div>
                <!-- cart -->
                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card mb-3 border shadow-0">
                        <div class="card-body">
                            <form method="POST" action="{{ route('client.carts.apply_coupon') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">Mã giảm giá?</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border" name="coupon_code"
                                            placeholder="Mã giảm giá"  value="{{Session::get('coupon_code')}}"/>
                                        <button class="btn btn-light border">Áp dụng</button>
                                    </div>
                                    @if (session('message'))
                                        <p class="text-primary">{{ session('message') }}</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card shadow-0 border">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Tổng tiền:</p>
                                <p class="mb-2 total-price" data-price="{{ $cart->total_price }}">
                                    $"{{ $cart->total_price }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Giảm giá:</p>
                                @if (session('discount_amount_price'))
                                    <p class="mb-2 text-success coupon-div" data-price="{{session('discount_amount_price')}}">-${{session('discount_amount_price')}}</p>
                                @endif
                            </div>
                            {{-- <div class="d-flex justify-content-between">
                                <p class="mb-2">TAX:</p>
                                <p class="mb-2">$14.00</p>
                            </div> --}}
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Thanh toán:</p>
                                <p class="mb-2 fw-bold total-price-all"></p>
                            </div>

                            <div class="mt-3">
                                <a href="{{route('client.carts.checkout')}}" class="btn btn-success w-100 shadow-0 mb-2"> Check out </a>
                                <a href="#" class="btn btn-light w-100 border mt-2"> Back </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>
    <!-- cart + summary -->
    <section>
        <div class="container my-5">
            <header class="mb-4">
                <h3>Sản phẩm đề xuất</h3>
            </header>

            <div class="row">
                @foreach ($products as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6" style="margin-top: 12px;">
                        <div class="card px-4 border shadow-0 mb-4 mb-lg-0">
                            <div class="mask px-2" style="height: 50px;">
                                <div class="d-flex justify-content-between">
                                    <h6><span class="badge bg-danger pt-1 mt-3 ms-2">Mới</span></h6>
                                    <a href="#"><i
                                            class="fas fa-heart text-primary fa-lg float-end pt-3 m-2"></i></a>
                                </div>
                            </div>
                            <a href="#" class="">
                                <img src="{{ $item->images ? asset('upload/' . $item->images->url) : 'upload/default.jpg' }}"
                                    class="card-img-top rounded-2" />
                            </a>
                            <div class="card-body d-flex flex-column pt-3 border-top">
                                <a href="#" class="nav-link">{{ $item->name }}</a>
                                <div class="price-wrap mb-2">
                                    <strong class="">${{ $item->price }}</strong>
                                    <del class="">${{ $item->sale }}</del>
                                </div>
                                <div class="card-footer d-flex align-items-end pt-3 px-0 pb-0 mt-auto">
                                    <a href="{{route('client.products.show', $item->id)}}" class="btn btn-outline-primary w-100">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- Recommended -->
@endsection

<!-- Tại phần cuối của layout hoặc trang hiển thị sản phẩm -->
@section('script')
    <!-- Thêm thư viện jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('admin/assets/base/base.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.1/underscore-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Lấy tất cả các nút "Tăng" và "Giảm" và thêm sự kiện click cho chúng
        var minusButtons = document.querySelectorAll('[id^="button-addon1"]');
        var plusButtons = document.querySelectorAll('[id^="button-addon2"]');

        // Lặp qua tất cả các nút "Tăng" và thêm sự kiện click
        minusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var inputId = button.dataset.id;
                var inputElement = document.getElementById('productQuantityInput-' + inputId);
                var quantity = parseInt(inputElement.value);

                // Giảm số lượng nếu lớn hơn 1
                if (quantity > 1) {
                    quantity--;
                    inputElement.value = quantity;
                }
            });
        });

        // Lặp qua tất cả các nút "Giảm" và thêm sự kiện click
        plusButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var inputId = button.dataset.id;
                var inputElement = document.getElementById('productQuantityInput-' + inputId);
                var quantity = parseInt(inputElement.value);

                // Tăng số lượng
                quantity++;
                inputElement.value = quantity;
            });
        });


        $(function() {
            // Lấy mã token CSRF từ trường meta
            var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Đặt mã token vào tiêu đề yêu cầu AJAX
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            });


            getTotalValue();
            function getTotalValue() {
                let total = $('.total-price').data('price');
                let couponPrice = $('.coupon-div')?.data('price') ?? 0;
                $('.total-price-all').text(`$${total - couponPrice}`);
            }


            // xóa giỏ hàng
            $(document).on('click', '.btn-remove-product', function(e) {
                let url = $(this).data('action');
                confirmDelete()
                    .then(function() {
                        $.post(url, res => {
                            let cart = res.cart;
                            let cartProductId = res.product_cart_id;
                            $('#productCountCart').text(cart.product_count);
                            $('.total-price').text(`$${cart.total_price}`).data('price', cart
                                .product_count);
                            $(`#row-${cartProductId}`).remove();
                            getTotalValue();
                        })
                    })
                    .catch(function() {

                    })
            })

            const TIME_TO_UPDATE = 1000;
            $(document).on('click', '.btn-update-quantity', _.debounce(function(e) {
                let url = $(this).data('action');
                let id = $(this).data('id');
                let data = {
                    product_quantity: $(`#productQuantityInput-${id}`).val()
                };

                $.post(url, data, res => {
                    let cartProductId = res.product_cart_id;
                    let cart = res.cart;
                    $('#productCountCart').text(cart.product_count);


                    if (res.remove_product) {
                        $(`#row-${cartProductId}`).remove();
                    } else {
                        $(`#cartProductPrice${cartProductId}`).html(
                            `$${res.cart_product_price}`);
                    }

                    // Cập nhật tổng giá trị trong DOM
                    $('.total-price').text(`$${cart.total_price}`).data('price', cart.total_price);


                    getTotalValue();

                    Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Cập nhật thành công",
                        showConfirmButton: false,
                        timer: 1500,
                    });

                });
            }, TIME_TO_UPDATE));
        });
    </script>

@endsection
