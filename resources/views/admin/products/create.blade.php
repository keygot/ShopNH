@extends('admin.layouts.app')

@section('title', 'Thêm mới sản phẩm')

@section('content')

    <div class="col-md-12">

        <div class="tile">

            <h3 class="tile-title"></h3>
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#AddSizeModal"><i
                                class="fas fa-folder-plus"></i> Add size</a>
                    </div>






                </div>
                <form class="row" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-4">
                        <div class="form-group col-md-12">
                            <label class="control-label">Tên sản phẩm</label>
                            <input class="form-control" value="{{ old('name') }}" name="name" type="text">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Ảnh đại diện</label>
                            <div id="myfileupload">
                                <input type="file" id="uploadfile" accept="image/*" name="image"
                                    onchange="readURL(this);">
                            </div>
                            <div id="thumbbox">
                                <img height="300" width="300" alt="Thumb image" id="thumbimage" style="display: none">
                                <a class="removeimg" href="javascript:"></a>
                            </div>
                            <div id="boxchoice">
                                <a href="javascript:" class="Choicefile"><i class="bx bx-upload"></i></a>
                                <p style="clear:both"></p>
                            </div>

                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-md-12">
                            <label class="control-label">Giá</label>
                            <input class="form-control" value="{{ old('price') }}" name="price" type="text">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-md-12">
                            <label class="control-label">Giảm giá</label>
                            <input class="form-control" name="sale" type="text" value="{{ old('sale') }}">
                            @error('sale')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Mô tả thêm</label>
                            <textarea class="form-control" name="description" id="description" type="text">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleSelect1" class="control-label" name="group">Danh mục</label>
                            <select class="form-control" name="category_id[]" id="exampleSelect1" multiple
                                style="min-height: 140px;">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="modal fade" id="AddSizeModal" tabindex="-1" aria-labelledby="AddSizeModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="AddSizeModalLabel">Add size</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" id="AddSizeModalBody">
                                        <!-- ... Phần code trước đó của form ... -->
                                        <input type="hidden" id="inputSize" name="sizes"
                                            value="{{ old('sizes', '[]') }}">

                                    </div>
                                    <div class="mt-3">
                                        <button type="button" class="btn  btn-primary btn-add-size">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">

                            <button class="btn btn-save" type="submit">Lưu lại</button>
                            <a class="btn btn-cancel" href="/doc/table-data-table.html">Hủy bỏ</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection


@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.21/lodash.min.js"
        integrity="sha512-WFN04846sdKMIP5LKNphMaWzU7YpMyCU245etK3g/2ARYbPK9Ub18eG+ljU96qKRCWh+quCY7yefSmlkQw1ANQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let sizes = [{
            id: Date.now(),
            size: 'M',
            quantity: 1
        }];
    </script>

    <script src="{{ asset('admin/assets/js/product/product.js') }}"></script>
@endsection
