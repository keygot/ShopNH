@extends('client.layouts.app')
@section('title', 'checkout')
@section('content')
    <section class="bg-light py-5">
        <div class="container">
            <form class="row" action="{{ route('client.carts.process') }}" method="POST">
                @csrf
                <div class="col-xl-8 col-lg-8 mb-4">
                    <!-- Checkout -->
                    <div class="card shadow-0 border">
                        <div class="p-4">
                            <h5 class="card-title mb-3">Thông tin thanh toán</h5>
                            <div class="row">
                                <div class="col-6 mb-3">
                                    <p class="mb-0">Họ và tên</p>
                                    <div class="form-outline">
                                        <input type="text" id="typeText" name="customer_name"
                                            value="{{ old('customer_name') }}" placeholder="Nguyễn Hữu Nhật"
                                            class="form-control" />
                                    </div>
                                    @error('customer_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6">
                                    <p class="mb-0">E-mail</p>
                                    <div class="form-outline">
                                        <input type="text" id="typeText" name="customer_email"
                                            value="{{ old('customer_email') }}" placeholder="nhatnhdhv@gmail.com"
                                            class="form-control" />
                                    </div>
                                    @error('customer_email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <p class="mb-0">Số điện thoại</p>
                                    <div class="form-outline">
                                        <input type="tel" id="typePhone" name="customer_phone"
                                            value="{{ old('customer_phone') }}" class="form-control" />
                                    </div>
                                    @error('customer_phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-6 mb-3">
                                    <p class="mb-0">Địa chỉ</p>
                                    <div class="form-outline">
                                        <input type="tel" id="typePhone" name="customer_address"
                                            value="{{ old('customer_address') }}" class="form-control" />
                                    </div>
                                    @error('customer_address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                            </div>

                            <hr class="my-4" />

                            <h5 class="card-title mb-3">Hình thức vận chuyển</h5>

                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <!-- Default checked radio -->
                                    <div class="form-check h-100 border rounded-3">
                                        <div class="p-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" checked />
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Vận chuyển nhanh <br />
                                                <small class="text-muted">3-4 ngày</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <!-- Default radio -->
                                    <div class="form-check h-100 border rounded-3">
                                        <div class="p-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Bình thường <br />
                                                <small class="text-muted">5-7 ngày </small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <!-- Default radio -->
                                    <div class="form-check h-100 border rounded-3">
                                        <div class="p-3">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault3" />
                                            <label class="form-check-label" for="flexRadioDefault3">
                                                Hỏa tốc<br />
                                                <small class="text-muted">1-2 ngày</small>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-title mb-3">Hình thức thanh toán</h5>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment" value="money" checked>
                                <label class="form-check-label" for="flexCheckDefault1">Tiền mặt</label>
                            </div>


                            <div class="mb-3">
                                <p class="mb-0">Ghi chú</p>
                                <div class="form-outline">
                                    <textarea class="form-control" id="textAreaExample1" name="note" value="{{ old('note') }}" rows="2"></textarea>
                                </div>
                                @error('note')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="float-end">
                                <button class="btn btn-light border">Quay lại</button>
                                <button type="submit" class="btn btn-success shadow-0 border">Tiếp tục</button>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout -->
                </div>
                <div class="col-xl-4 col-lg-4 d-flex justify-content-center justify-content-lg-end">
                    <div class="ms-lg-4 mt-4 mt-lg-0" style="max-width: 320px;">
                        <h6 class="mb-3">Hóa đơn</h6>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Tổng tiền:</p>
                            <p class="mb-2 total-price" data-price="{{ $cart->total_price }}">${{ $cart->total_price }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Giảm giá:</p>
                            @if (session('discount_amount_price'))
                                <p class="mb-2 text-danger coupon-div"
                                    data-price="{{ session('discount_amount_price') }}">-
                                    ${{ session('discount_amount_price') }}</p>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Phí vận chuyển:</p>
                            <p class="mb-2 shipping" data-price="10">$10</p>
                            <input type="hidden" name="ship" id="ship" value="10">

                        </div>
                        <hr />
                        <div class="d-flex justify-content-between">
                            <p class="mb-2">Thanh toán:</p>
                            <p class="mb-2 fw-bold total-price-all"></p>
                            <input type="hidden" name="total" id="total" value="">
                        </div>

                        <div class="input-group mt-3 mb-4">
                            <input type="text" class="form-control border" name=""
                                placeholder="Mã giảm giá" />
                            <button class="btn btn-light text-primary border">Áp dụng</button>
                        </div>

                        <hr />


                        <h6 class="text-dark my-4">Sản phẩm</h6>

                        @foreach ($cart->products as $item)
                            <div class="d-flex align-items-center mb-4">
                                <div class="me-3 position-relative">
                                    <span
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-secondary">
                                        {{ $item->product_quantity }}
                                    </span>
                                    <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/7.webp"
                                        style="height: 96px; width: 96x;" class="img-sm rounded border" />
                                </div>
                                <div class="">
                                    <a href="#" class="nav-link">
                                        {{ $item->product->name }}
                                    </a>
                                    <div class="price text-muted">Số tiền: ${{ $item->product->price }} / Sản phẩm</div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('script')
    <!-- Thêm thư viện jQuery từ CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('admin/assets/base/base.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.13.1/underscore-min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
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
                let shipping = $('.shipping').data('price');
                $('.total-price-all').text(`$${total + shipping - couponPrice}`);
                $('#total').val(total + shipping - couponPrice);
            }



        });
    </script>
@endsection
