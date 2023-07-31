@extends('client.layouts.app')
@section('title', 'Chi tiết sản phẩm' . ' ' . $product->name)
@section('content')
    <!-- content -->
    <section class="py-5">
        <form action="{{ route('client.carts.add') }}" method="post" class="container">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image"
                            href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                                src="{{ $product->images ? asset('upload/' . $product->images->url) : 'upload/default.jpg' }}" />
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        {{-- <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" />
            </a>
            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" class="item-thumb">
              <img width="60" height="60" class="rounded-2" src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" />
            </a> --}}
                    </div>
                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>
                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark">
                            {{ $product->name }}
                        </h4>
                        <div class="d-flex flex-row my-3">
                            <div class="text-warning mb-1 me-2">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="ms-1">
                                    4.5
                                </span>
                            </div>
                            <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 đơn hàng</span>
                            <span class="text-success ms-2">trong kho</span>
                        </div>

                        <div class="mb-3">
                            <span class="h5">{{ $product->price }}</span>
                            <span class="text-muted">/ sản phẩm</span>
                        </div>


                        <div class="row">
                            <dt class="col-3">Kiểu dáng:</dt>
                            <dd class="col-9">Thường, vip</dd>

                            <dt class="col-3">Màu sắc:</dt>
                            <dd class="col-9">Brown</dd>

                            <dt class="col-3">Chất liệu:</dt>
                            <dd class="col-9">Cotton, Jeans</dd>

                            <dt class="col-3">Thương hiệu:</dt>
                            <dd class="col-9">Celine</dd>

                            <dt class="col-3">Kích thước:</dt>
                            <dd class="col-9">
                                <div class="row mb-3">
                                    @if ($product->productDetails->count() > 0)

                                        @foreach ($product->productDetails as $size)
                                            <div class="col-lg-4 mb-3">
                                                <!-- Default checked radio -->
                                                <div class="form-check h-100 border rounded-3">
                                                    <div class="p-3">
                                                        <input class="form-check-input" type="radio"
                                                             name="product_size" id="size{{$size->size}}" value="{{$size->size}}">
                                                        <label class="form-check-label" for="size{{$size->size}}">

                                                            {{ $size->size }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="col-lg-4 mb-3">
                                            <p>Hết size</p>
                                        </div>
                                    @endif

                                </div>
                            </dd>
                        </div>

                        @if(session('message')) 
                            <h4>{{session('message')}}</h4>

                        @endif
                        <hr />

                        <div class="row mb-4">
                          
                            <!-- col.// -->
                            <div class="col-md-4 col-6 mb-3">
                                <label class="mb-2 d-block">Số lượng</label>
                                <div class="input-group mb-3" style="width: 170px;">
                                    <button class="btn btn-white border border-secondary px-3" type="button"
                                        id="button-addon1" data-mdb-ripple-color="dark" fdprocessedid="kv109o"
                                        data-id="{{ $product->id }}"
                                        data-action="{{ route('client.carts.update_product_quantity', $product->id) }}">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="text"
                                        class="form-control text-center border border-secondary"
                                        id="productQuantityInput-{{ $product->id }}" min="1"
                                        value="1"
                                        aria-label="Example text with button addon"
                                        aria-describedby="button-addon1" name="product_quantity"
                                        fdprocessedid="hlyrle">
                                    <button class="btn btn-white border border-secondary px-3" type="button"
                                        id="button-addon2" data-mdb-ripple-color="dark" fdprocessedid="htunk"
                                        data-id="{{ $product->id }}"
                                        data-action="{{ route('client.carts.update_product_quantity', $product->id) }}">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="btn btn-warning shadow-0"> Mua ngay </a>
                        <button type="submit" class="btn btn-primary shadow-0"> <i class="me-1 fa fa-shopping-basket"></i> Thêm
                            vào giỏ </button>
                        <a href="#" class="btn btn-light border border-secondary py-2 icon-hover px-3"> <i
                                class="me-1 fa fa-heart fa-lg"></i> Lưu lại </a>
                    </div>
                </main>
            </div>
        </form>
    </section>
    <!-- content -->

    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel"
                                aria-labelledby="ex1-tab-1">
                                <p>
                                    {{ $product->description }}
                                </p>

                                <table class="table border mt-3 mb-2">
                                    <tr>
                                        <th class="py-2">Display:</th>
                                        <td class="py-2">13.3-inch LED-backlit display with IPS</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Processor capacity:</th>
                                        <td class="py-2">2.3GHz dual-core Intel Core i5</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Camera quality:</th>
                                        <td class="py-2">720p FaceTime HD camera</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Memory</th>
                                        <td class="py-2">8 GB RAM or 16 GB RAM</td>
                                    </tr>
                                    <tr>
                                        <th class="py-2">Graphics</th>
                                        <td class="py-2">Intel Iris Plus Graphics 640</td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Similar items</h5>
                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/8.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1">
                                            Rucksack Backpack Large <br />
                                            Line Mounts
                                        </a>
                                        <strong class="text-dark"> $38.90</strong>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/9.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1">
                                            Summer New Men's Denim <br />
                                            Jeans Shorts
                                        </a>
                                        <strong class="text-dark"> $29.50</strong>
                                    </div>
                                </div>

                                <div class="d-flex mb-3">
                                    <a href="#" class="me-3">
                                        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for men
                                            and lady </a>
                                        <strong class="text-dark"> $120.00</strong>
                                    </div>
                                </div>

                                <div class="d-flex">
                                    <a href="#" class="me-3">
                                        <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/11.webp"
                                            style="min-width: 96px; height: 96px;" class="img-md img-thumbnail" />
                                    </a>
                                    <div class="info">
                                        <a href="#" class="nav-link mb-1"> Blazer Suit Dress Jacket for Men, Blue
                                            color </a>
                                        <strong class="text-dark"> $339.90</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- Tại phần cuối của layout hoặc trang hiển thị sản phẩm -->
@section('script')
    <!-- Thêm đoạn mã JavaScript -->
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
    </script>
@endsection
