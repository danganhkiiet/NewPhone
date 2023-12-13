@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Chi tiết phiếu nhập hàng</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('phieu-nhap.danh-sach') }}">Phiếu Nhập Hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi Tiết Nhập Hàng</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- Thong bao -->
                @if (session('thong_bao'))
                    <div class="alert alert-success alert-dismissible fade show p-0 mb-4" role="alert">
                        <p class="py-3 px-5 mb-0 border-bottom border-bottom-success-light">
                            <span class="alert-inner--icon me-2"><i class="fe fe-thumbs-up"></i></span>
                            <strong>Thành công</strong>
                        </p>
                        <p class="py-3 px-5"> {{ session('thong_bao') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <!-- ket thuc thong bao -->
                <!-- Row -->
                <div class="row">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Danh Sách</h3>
                                    <div class="btn" style="position: relative;left: 78%;">
                                        <a href="{{ route('phieu-nhap.them-moi-phieu-nhap') }}" class="btn btn-primary-light ">Thêm mới</a>
                                    </div>
                                    <!-- form tim kiem -->
                                    <form action="" class="form-inline" role="form"
                                        style="position: relative;left: 45%;">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="ten"
                                                placeholder="Nhập tên bạn muốn tìm" />
                                            <button type="submit">
                                                <a class="btn btn-primary fs-14 text-white edit-icn" title="Edit"
                                                    href="#">
                                                    <i class="fe fe-search"></i>
                                                </a>
                                            </button>
                                        </div>
                                    </form>
                                    <!-- ket thuc form tim kiem -->
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table editable-table table-nowrap table-bordered table-edit">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Điện thoại</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá nhập</th>
                                                    <th>Giá bán</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
@endsection
@section('js-jquery')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Lấy ID từ localStorage
            var id = localStorage.getItem('ID_phieu_nhap');
            //tạo chuỗi urlchi_tiet_
            var url = "{{ route('phieu-nhap.xem-chi-tiet', ['id' => ':id']) }}";
            //thay thế :id bằng biến id lấy từ local
            url = url.replace(':id', id);
            var table = $('#myTable').DataTable({
                ajax: {
                    url: url
                },
                processing:true,
                serverSide:true,
                columns:[
                    {
                        data: "DT_RowIndex",
                        name:"DT_RowIndex",
                    },
                    {
                        data: "dien_thoai",
                        name:"dien_thoai",
                    },
                    {
                        data: "so_luong",
                        name:"so_luong",
                    },
                    {
                        data: "gia_nhap",
                        name:"gia_nhap",
                    },
                    {
                        data: "gia_ban",
                        name:"gia_ban",
                    },
                    {
                        data: "thanh_tien",
                        name: "thanh_tien",
                    },
                ],
                "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 50, 100],
                    "language": {
                        // "sInfo": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                        "sInfo": "",
                        "sInfoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                        "sInfoFiltered": "(được lọc từ tổng số _MAX_ mục)",
                        "sLengthMenu": "Hiển thị _MENU_ mục",
                        "sSearch": "Tìm kiếm:",
                        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                        "oPaginate": {
                            "sFirst": "Đầu",
                            "sLast": "Cuối",
                            "sNext": "Tiếp",
                            "sPrevious": "Trước"
                        }
                    },
                    "search": {
                        "input": '<input type="text" class="form-control" name="ten" placeholder="Nhập tên" />'
                    },
            })
        });
    </script>
@endsection
