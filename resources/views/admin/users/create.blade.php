@extends('admin.layouts.app')

@section('title', 'Thêm mới người dùng')

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
                <form class="row" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-4">
                        <div class="form-group col-md-12">
                            <label class="control-label">Họ và tên</label>
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
                            <label class="control-label">Email</label>
                            <input class="form-control" value="{{ old('email') }}" name="email" type="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Số điện thoại</label>
                            <input class="form-control" value="{{ old('phone') }}" name="phone" type="text">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="form-group col-md-12">
                            <label class="control-label">Địa chỉ</label>
                            <textarea class="form-control" name="address" type="text">{{ old('address') }}</textarea>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="exampleSelect1" class="control-label" name="group">Giới tính</label>
                            <select class="form-control" name="gender" id="exampleSelect1">
                                <option>-- Chọn giới tính --</option>
                                <option value="male">Nam</option>
                                <option value="fe-male">Nữ</option>

                            </select>
                            @error('group')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Mật khẩu</label>
                            <input class="form-control" type="password" name="password" type="text">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <button class="btn btn-save" type="submit">Lưu lại</button>
                            <a class="btn btn-cancel" href="/doc/table-data-table.html">Hủy bỏ</a>
                        </div>


                    </div>

                    <div class="col-8">

                        <label class="control-label">Quyền hạn</label>

                        <div class="row">
                            @foreach ($roles as $groupName => $role)
                                <div class="col-3">
                                    <h4>{{ $groupName }}</h4>
                                    <div>
                                        @foreach ($role as $item)
                                            <p class="animated-checkbox mt-20">
                                                <label>
                                                    <input id="drop-remove" name="role_ids[]" type="checkbox"
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






                </form>
            </div>

        </div>
    </div>


@endsection
