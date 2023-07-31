@extends('admin.layouts.app')

@section('title', 'Thêm mới danh mục')

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
                <form class="row" method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="col-4">
                        <div class="form-group col-md-12">
                            <label class="control-label">Tên danh mục</label>
                            <input class="form-control" value="{{ old('name') }}" name="name" type="text">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleSelect1" class="control-label" name="parent">Danh mục cha</label>
                            <select class="form-control" name="parent_id" id="exampleSelect1">
                                <option value="">-- Chọn danh mục cha --</option>
                                @foreach ($parentCategories as $item) 
                                    <option value="{{$item->id}}" {{old('parent_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>

                                @endforeach

                            </select>
                            @error('parent_ids')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
