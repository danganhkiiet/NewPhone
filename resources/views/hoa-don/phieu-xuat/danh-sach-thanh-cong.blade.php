@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- row -->
                <div class="row row-deck">

                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Phiếu Xuất Thành Công</h3>
                                <div class="btn" style="position: relative;left: 55%;">
                                    <!-- Button trigger modal -->
                                    <a href="{{ route('phieu-xuat.danh-sach-van-chuyen') }}"
                                        class="btn btn-primary-light ">Trở lại phiếu vận chuyển
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table border text-nowrap text-md-nowrap table-hover" id="myTable">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Trạng Thái Đơn Hàng</th>
                                            <th>Người xác nhận</th>
                                            <th>Tổng Tiền</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Chi Tiết Phiếu Xuất Thành Công</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table editable-table table-nowrap table-bordered table-edit "
                                            id="table-detail">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Điện Thoại</th>
                                                    <th>Số Lượng</th>
                                                    <th>Giá Bán</th>
                                                    <th>Thành Tiền</th>
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
                <div class="row row-deck">

                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Phiếu Đã Hủy</h3>
                            </div>
                            <div class="card-body">
                                <table class="table border text-nowrap text-md-nowrap table-hover" id="myTableDaHuy">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Khách Hàng</th>
                                            <th>Trạng Thái Đơn Hàng</th>
                                            <th>Người xác nhận</th>
                                            <th>Tổng Tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js-jquery')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#myTable').DataTable({
                ajax: {
                    url: "{{ route('phieu-xuat.danh-sach-thanh-cong') }}",
                    type: "GET",
                },
                //hiển thị một biểu tượng "đang xử lý" (thường là vòng tròn quay) để thông báo cho người dùng rằng dữ liệu đang được tải hoặc xử lý.
                processing: true,
                //Phía máy chủ có nghĩa là nó sẽ gửi các yêu cầu đến máy chủ để lấy dữ liệu thay vì xử lý dữ liệu trên phía máy khách.
                serverSide: true,

                columns: [{
                        data: "DT_RowIndex", // Sử dụng "DT_RowIndex" để lấy số thứ tự
                        name: "DT_RowIndex",

                    },
                    {
                        data: "khach_hang_id",
                        name: "khach_hang_id",
                    },
                    {
                        data: "trang_thai_don_hang_id",
                        name: "trang_thai_don_hang_id",
                    },
                    {
                        data: "admin_id",
                        name: "admin_id",
                    },
                    {
                        data: "tong_tien",
                        name: "tong_tien",
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
                }
            })
            var table1 = $('#myTableDaHuy').DataTable({
                ajax: {
                    url: "{{ route('phieu-xuat.danh-sach-da-huy') }}",
                    type: "GET",
                },
                //hiển thị một biểu tượng "đang xử lý" (thường là vòng tròn quay) để thông báo cho người dùng rằng dữ liệu đang được tải hoặc xử lý.
                processing: true,
                //Phía máy chủ có nghĩa là nó sẽ gửi các yêu cầu đến máy chủ để lấy dữ liệu thay vì xử lý dữ liệu trên phía máy khách.
                serverSide: true,

                columns: [{
                        data: "DT_RowIndex", // Sử dụng "DT_RowIndex" để lấy số thứ tự
                        name: "DT_RowIndex",

                    },
                    {
                        data: "khach_hang_id",
                        name: "khach_hang_id",
                    },
                    {
                        data: "trang_thai_don_hang_id",
                        name: "trang_thai_don_hang_id",
                    },
                    {
                        data: "admin_id",
                        name: "admin_id",
                    },
                    {
                        data: "tong_tien",
                        name: "tong_tien",
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
                }
            })
            $(document).on('click', '.btn-detail', function() {
                $id = $(this).data('id');

                $.ajax({
                    url: "{{ route('phieu-xuat.danh-sach-chi-tiet', '') }}/" + $id,

                }).done(function(response) {
                    console.log(response);
                    // Xóa dữ liệu cũ trong tbody
                    $('#table-detail tbody').empty();
                    // Tăng số thứ tự
                    var stt = 0;

                    // Duyệt qua mỗi phần tử trong response và thêm vào table
                    $.each(response, function(index, item) {
                        // Tạo một dòng HTML mới
                        stt = index + 1;
                        var row = `<tr>
                                    <td>${stt}</td>
                                    <td>${item.chi_tiet_dien_thoai.dien_thoai.ten}</td>
                                    <td>${item.so_luong}</td>
                                    <td>${item.gia_ban}</td>
                                    <td>${item.thanh_tien}</td>
                                </tr>`;
                        $('#phieu_xuat_id').val(item.phieu_xuat_id);
                        // Thêm dòng mới vào tbody
                        $('#table-detail tbody').append(row);

                    })
                    // Ẩn phần xác nhận trạng thái
                    $('#confirmationCard').show();
                    $('#confirmationCard').removeClass('d-none');


                })

            })


        });
    </script>
@endsection
