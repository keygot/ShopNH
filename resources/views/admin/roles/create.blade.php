@extends('admin.layouts.app')

@section('title', 'Thêm mới quyền truy cập')

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
                <form class="row" method="POST" action="{{ route('roles.store') }}">
                    @csrf
                    <div class="col-4">
                        <div class="form-group col-md-12">
                            <label class="control-label">Tên quyền</label>
                            <input class="form-control" value="{{ old('name') }}" name="name" type="text"
                                >
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Tên hiển thị</label>
                            <input class="form-control" value="{{ old('display_name') }}" name="display_name" type="text"
                                >
                            @error('display_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="exampleSelect1" class="control-label" name="group">Nhóm quyền</label>
                            <select class="form-control" name="group" id="exampleSelect1">
                                <option>-- Chọn nhóm quyền --</option>
                                <option value="system">System</option>
                                <option value="user">User</option>

                            </select>
                            @error('group')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-8">

                        <label class="control-label">Quyền hạn</label>

                        <div class="row">
                            @foreach ($permissions as $groupName => $permissionGroup)
                                <div class="col-3">
                                    <h4>{{ $groupName }}</h4>
                                    <div>
                                        @foreach ($permissionGroup as $item)
                                            <p class="animated-checkbox mt-20">
                                                <label>
                                                    <input id="drop-remove" name="permission_ids[]" type="checkbox"
                                                        value="{{ $item->id }}">
                                                    <span class="label-text">{{ $item->display_name }}</span>
                                                </label>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>





                    <button class="btn btn-save" type="submit">Lưu lại</button>
                    <a class="btn btn-cancel" href="/doc/table-data-table.html">Hủy bỏ</a>
                </form>
            </div>

        </div>
    </div>


@endsection
