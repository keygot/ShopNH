@extends('admin.layouts.app')

@section('title', 'Quản lý người dùng')

@section('content')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">

                        <a class="btn btn-add btn-sm" href="{{route('users.create')}}" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới người dùng</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm nhap-tu-file" type="button" title="Nhập"
                            onclick="myFunction(this)"><i class="fas fa-file-upload"></i> Tải từ file</a>
                    </div>

                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm print-file" type="button" title="In"
                            onclick="myApp.printTable()"><i class="fas fa-print"></i> In dữ liệu</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm print-file js-textareacopybtn" type="button" title="Sao chép"><i
                                class="fas fa-copy"></i> Sao chép</a>
                    </div>

                    <div class="col-sm-2">
                        <a class="btn btn-excel btn-sm" href="" title="In"><i class="fas fa-file-excel"></i> Xuất
                            Excel</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm pdf-file" type="button" title="In"
                            onclick="myFunction(this)"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
                    </div>
                    <div class="col-sm-2">
                        <a class="btn btn-delete btn-sm" type="button" title="Xóa" onclick="myFunction(this)"><i
                                class="fas fa-trash-alt"></i> Xóa tất cả </a>
                    </div>
                </div>
                <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                        <tr>
                            <th width="10"><input type="checkbox" id="all"></th>
                            <th>ID</th>
                            <th>Họ và tên</th>
                            <th>Hình ảnh</th>
                            <th>Email</th>
                            <th>Số điện thoại</th></th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td><img class="img-card-person" src="{{$user->images ? asset('upload/' .$user->images->url) : 'upload/default.jpg'}}" alt=""></td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            
                            <td style="display: flex;">
                                <form action="{{route('users.destroy', $user->id)}}" method="POST" style="margin-right: 4px;">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm" title="Xóa">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                               
                                <a class="btn btn-primary btn-sm edit" type="" href="{{route('users.edit', $user->id)}}" title="Sửa"><i class="fas fa-edit"></i></a>

                            </td>
                        </tr>
                        @endforeach
                       
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
