@extends('admin.layouts.app')

@section('title', 'Quản lý danh mục')

@section('content')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">

                        <a class="btn btn-add btn-sm" href="{{route('categories.create')}}" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới danh mục</a>
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
                            <th>Tên danh mục</th>
                            <th>Danh mục cha</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->parent_name}}</td>
                            
                            <td style="display: flex;">
                                <form action="{{route('categories.destroy', $category->id)}}" method="POST" id="form-delete{{$category->id}}" >
                                    @csrf
                                    @method('delete')
                                   
                                </form>
                                <button class="btn btn-danger btn-sm" title="Xóa" data-id="{{$category->id}}" style="margin-right: 4px;">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                               
                                <a class="btn btn-primary btn-sm edit" type="" href="{{route('categories.edit', $category->id)}}" title="Sửa"><i class="fas fa-edit"></i></a>

                            </td>
                        </tr>
                        @endforeach
                       
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
