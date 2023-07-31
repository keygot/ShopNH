@extends('admin.layouts.app')

@section('title', 'Quản lý đơn hàng')

@section('content')
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="row element-button">
                    <div class="col-sm-2">

                        <a class="btn btn-add btn-sm" href="#" title="Thêm"><i class="fas fa-plus"></i>
                            Tạo mới đơn hàng</a>
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
                            <th>Trạng thái</th>
                            <th>Tổng tiền</th>
                            <th>Vận chuyển</th>
                            <th>Tên khách hàng</th>
                            <th>Tên email</th>
                            <th>Địa chỉ</th>
                            <th>Thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td width="10"><input type="checkbox" name="check1" value="1"></td>
                            <td>{{$order->id}}</td>
                            <td>
                                <div class="input-group input-group-static mb-4">
                                    <select name="status" class="form-control select-status"
                                        data-action="{{ route('admin.orders.update_status', $order->id) }}">
                                        @foreach (config('order.status') as $status)
                                            <option value="{{ $status }}"
                                                {{ $status == $order->status ? 'selected' : '' }}>{{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->ship}}</td>
                            <td>{{$order->customer_name}}</td>
                            <td>{{$order->customer_email}}</td>
                            <td>{{$order->customer_address}}</td>
                            <td>{{$order->payment}}</td>
                            
                            
                        </tr>
                        @endforeach
                       
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
      <script src="{{ asset('admin/assets/order/order.js') }}"></script>
  @endsection

