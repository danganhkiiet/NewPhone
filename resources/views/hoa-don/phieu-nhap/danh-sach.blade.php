@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Phiếu nhập hàng</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Phiếu Nhập Hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh Sách</li>
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
                                        <a href="{{ route('phieu-nhap.them-moi-phieu-nhap') }}" class="btn btn-primary-light ">Thêm
                                            mới</a>
                                    </div>
                                    {{-- <div class="btn" style="position: relative;left: 78%;">
                                        <a href="{{ route('phieu-nhap.them-moi-phieu-nhap') }}" class="btn btn-primary-light ">Các sản phẩm đã xóa
                                            </a>
                                    </div> --}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table editable-table table-nowrap table-bordered table-edit">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Người tạo</th>
                                                    <th>Thông tin nhân viên giao hàng</th>
                                                    <th>Nhà cung cấp</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Ngày nhập hàng</th>
                                                    <th>#</th>
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
            var table = $('#myTable').DataTable({
                ajax: {
                    url: "{{route('phieu-nhap.danh-sach')}}"
                },
                processing:true,
                serverSide:true,
                columns:[
                    {
                        data: "DT_RowIndex",
                        name:"DT_RowIndex",
                    },
                    {
                        data: "Admin",
                        name:"Admin",
                    },
                    {
                        data: "thong_tin_nguoi_giao",
                        name:"thong_tin_nguoi_giao",
                    },
                    {
                        data: "nhaCungCap",
                        name:"nhaCungCap",
                    },
                    {
                        data: "tong_tien",
                        name:"tong_tien",
                    },
                    {
                        data: "ngay_nhap_hang",
                        name:"ngay_nhap_hang",
                    },
                    {
                        data: "Action",
                        name: "Action",
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
            // Bắt sự kiện khi một hàng được chọn trong DataTables
            $('#myTable tbody').on('click', 'tr', function () {
                var data = table.row(this).data();
                var id = data['id']; // Giả sử ID của hàng được lưu trong cột 'id'
                
                // Lưu ID vào localStorage
                localStorage.setItem('ID_phieu_nhap', id);
            });
        });

    </script>
@endsection
