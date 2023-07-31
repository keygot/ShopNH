@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa mã giảm giá' . $coupon->name)

@section('content')

    <div class="col-md-12">

        <div class="tile">

            <h3 class="tile-title"></h3>
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">
                        <a class="btn btn-add btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><b><i
                                    class="fas fa-folder-plus"></i> Tạo chức vụ mới</b></a>
                    </div>

                </div>
                <form class="row" method="POST" action="{{ route('coupons.update', $coupon->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="col-4">
                        <div class="form-group col-md-12">
                            <label class="control-label">Name</label>
                            <input class="form-control" value="{{ old('name') ?? $coupon->name }}" name="name" type="text" style="text-transform: uppercase;">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        

                        <div class="form-group col-md-12">
                            <label class="control-label">Value</label>
                            <input class="form-control" value="{{ old('value') ?? $coupon->value }}" name="value" type="number">
                            @error('value')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleSelect1" class="control-label" name="parent">Type</label>
                            <select class="form-control" name="type" id="exampleSelect1">
                                <option>-- Select type --</option>
                                <option value="money" {{ old('type') ?? $coupon->type == 'money' ? 'selected' : ''}}>Money</option>
                               
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Expery Date</label>
                            <input class="form-control" value="{{ old('expery_date') ?? $coupon->expery_date }}" name="expery_date" type="date">
                            @error('expery_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <button class="btn btn-save" type="submit">Cập nhật</button>
                            <a class="btn btn-cancel" href="/doc/table-data-table.html">Hủy bỏ</a>
                        </div>
                    </div>

                  


                   
                </form>
            </div>

        </div>
    </div>


@endsection
