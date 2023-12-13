@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Nhà Sản Xuất</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Nhà Sản Xuất</a></li>
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
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btnAdd">
                                            Thêm Mới
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table editable-table table-nowrap table-bordered table-edit"
                                            id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên</th>
                                                    <th>Địa Chỉ</th>
                                                    <th>Email</th>
                                                    <th>Số Điện Thoại</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thêm Mới</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true" id="btn-closeX">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="" id="myForm">
                                                        @csrf
                                                        <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                                            <h4 class="card-title">Nhập thông tin</h4>
                                                            <div class="form-group">
                                                                <input class="form-control" name="id" id="id"
                                                                    type="hidden" required>
                                                                <label class="form-label" for="ten">Tên Nhà Sản Xuất</label>
                                                                <input class="form-control" name="ten" id="ten"
                                                                    type="text" required>
                                                                <div class="invalid-feedback ten_error">

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="dia_chi">Địa chỉ</label>
                                                                <input class="form-control" name="dia_chi" id="dia_chi"
                                                                    type="text" required>
                                                                <div class="invalid-feedback dia_chi_error">

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="Email">Email</label>
                                                                <input class="form-control" name="email" id="Email"
                                                                    type="email" required>
                                                                <div class="invalid-feedback email_error">

                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="so_dien_thoai">Số điện
                                                                    thoại</label>
                                                                <input class="form-control" name="so_dien_thoai"
                                                                    pattern="[0-9]{10}" id="so_dien_thoai" type="tel"
                                                                    required>
                                                                <div class="invalid-feedback so_dien_thoai_error">

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    id="btn-close" data-dismiss="modal">Close</button>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-add btnSave">Save
                                                                    changes</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#myTable').DataTable({
                ajax: {
                    url: "{{ route('nha-san-xuat.danh-sach') }}",
                    type: "GET",
                    /* cái type nó tự động tích hợp  headers: {
                     'X-Requested-With': 'XMLHttpRequest' } để xác định có phải là ajax ko */
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
                        data: "ten",
                        name: "ten",
                    },
                    {
                        data: "dia_chi",
                        name: "dia_chi",
                    },
                    {
                        data: "email",
                        name: "email",
                    },
                    {
                        data: "so_dien_thoai",
                        name: "so_dien_thoai",
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
            $(document).on('click', '.btn-edit', function() {
                $id = $(this).data('id');

                $('#id').val($id);
                $.ajax({
                    url: "{{ route('nha-san-xuat.cap-nhat', '') }}/" + $id,
                }).done(function(data) {
                    console.log(data);
                    $('#ten').val(data.ten);
                    $('#dia_chi').val(data.dia_chi);
                    $('#Email').val(data.email);
                    $('#so_dien_thoai').val(data.so_dien_thoai);
                    $('#myModal').modal('show');
                })

            })
            $('.btnSave').click(function() {
                Swal.fire({
                    title: "Bạn có chắc không?",
                    text: "Bạn sẽ không thể hoàn nguyên điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Chắc chắn!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'POST',
                            url: "{{ route('nha-san-xuat.xu-ly-them-moi-cap-nhat') }}",
                            data: $('#myForm').serialize(),
                        }).done(function() {
                            Swal.fire({
                                title: "Thành công!",
                                text: "Thực hiện chức năng thành công.",
                                icon: "success"
                            });
                            //table.draw() vẽ lại bảng dữ liệu khi có sự thay đổi trong dữ liệu
                            table.draw();
                            $("#myForm").removeClass('was-validated');
                            $('#myModal').modal('hide');

                        }).fail(function(response) {
                            errors = response.responseJSON.errors;
                            console.log(errors);
                            $("#myForm").addClass('was-validated');
                            $.each(errors, function(key, value) {
                                $('.' + key + '_error').text(value[0]);
                                $('.' + key + '_error').text(value[1]);
                                $('.' + key + '_error').text(value[2]);
                                $('.' + key + '_error').text(value[3]);
                            })
                        })
                    }
                })

            })
            $(document).on('click', '.btnAdd', function() {
                $('#myModal').modal('show');
                $('#myForm').trigger('reset');
                $('#id').val("");
            })
            $('#btn-close').click(function() {
                $("#myForm").removeClass('was-validated');
                $('#myModal').modal('hide');

            })
            $('#btn-closeX').click(function() {
                $("#myForm").removeClass('was-validated');
                $('#myModal').modal('hide');
            })
        })
    </script>
@endsection
