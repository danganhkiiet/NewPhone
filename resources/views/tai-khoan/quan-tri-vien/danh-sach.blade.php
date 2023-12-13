@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Quản Trị Viên</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Quản Trị Viên</a></li>
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
                                    {{-- <!-- form tim kiem -->
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
                                    <!-- ket thuc form tim kiem --> --}}
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table editable-table table-nowrap table-bordered table-edit"
                                            id="myTable">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Họ Tên</th>
                                                    <th>Email</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Avatar</th>
                                                    <th>Cập Nhật</th>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Bảng Nhập</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" id="myForm" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                                            <h4 class="card-title">Nhập thông tin</h4>
                                                            <div class="form-group">
                                                                <input class="form-control" name="id" id="id"
                                                                    type="hidden" required>
                                                                <label class="form-label" for="ho_ten">Họ tên</label>
                                                                <input
                                                                    class="form-control @error('ho_ten') is-invalid @enderror"
                                                                    name="ho_ten" id="ho_ten" type="text" required>
                                                                @error('ho_ten')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <label class="form-label" for="email">Email</label>
                                                                <input
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    name="email" id="email" type="text" required>
                                                                @error('email')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <label class="form-label" for="password">Mật khẩu</label>
                                                                <input class="form-control" name="password" id="password"
                                                                    type="text">
                                                                <label
                                                                    class="form-label @error('so_dien_thoai') is-invalid @enderror"
                                                                    for="so_dien_thoai">Số điện thoại</label>
                                                                <input class="form-control" name="so_dien_thoai"
                                                                    id="so_dien_thoai" type="text" required>
                                                                @error('so_dien_thoai')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                                <label class="form-label" for="avatar">Avatar</label>

                                                                <input class="form-control" name="avatar" id="avatar"
                                                                    type="file">
                                                                <div class="col-auto">
                                                                    <label class="colorinput" style="display: flex">
                                                                        <input type="checkbox" class="colorinput-input"
                                                                            name="is_admin" id="is_admin" />
                                                                        <span class="colorinput-color bg-teal"></span>
                                                                        <label class="form-label" for="is_admin"
                                                                            style="padding: 0px 0px 0px 5px;">Là
                                                                            Admin</label>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
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
                    url: "{{ route('quan-tri-vien.danh-sach') }}",
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
                        data: "ho_ten",
                        name: "ho_ten",
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
                        data: "avatar",
                        name: "avatar",
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
                    url: "{{ route('quan-tri-vien.cap-nhat', '') }}/" + $id,
                }).done(function(data) {
                    console.log(data);
                    $('#ho_ten').val(data.ho_ten);
                    $('#email').val(data.email);
                    $('#so_dien_thoai').val(data.so_dien_thoai);
                    // Gán giá trị cho checkbox
                    if (data.is_admin) {
                        $('#is_admin').prop('checked', true);
                    } else {
                        $('#is_admin').prop('checked', false);
                    }
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
                        var frm_Data = new FormData($('#myForm')[0]);
                        $.ajax({
                            method: 'POST',
                            url: "{{ route('quan-tri-vien.them-moi-cap-nhat') }}",
                            data: frm_Data,
                            processData: false,
                            contentType: false,
                        }).done(function() {
                            Swal.fire({
                                title: "Thành công!",
                                text: "Thực hiện chức năng thành công.",
                                icon: "success"
                            });
                            //table.draw() vẽ lại bảng dữ liệu khi có sự thay đổi trong dữ liệu
                            table.draw();
                            $('#password').val("");
                            $('#myModal').modal('hide');

                        })
                    }
                })

            })
            $(document).on('click', '.btnAdd', function() {
                $('#myModal').modal('show');
                $('#myForm').trigger('reset');
                $('#id').val("");
            })
            $(document).on('click', '.btn-delete', function() {
                Swal.fire({
                    title: "Bạn có chắc không?",
                    text: "Bạn sẽ không thể hoàn nguyên điều này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Có, xóa nó đi!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $id = $(this).data('id');
                        $.ajax({
                            method: 'POST',
                            url: "{{ route('quan-tri-vien.xoa', '') }}/" + $id,
                        }).done(function() {
                            Swal.fire({
                                title: "Đã xóa!",
                                text: "Tập tin của bạn đã bị xóa.",
                                icon: "success"
                            });
                            table.draw();
                        })
                    }
                })
            })
            $(document).on('click', '#is_admin', function() {
                Swal.fire({
                    title: "Bạn có chắc không?",
                    text: "Bạn sẽ không thể hoàn nguyên điều này!",
                    icon: "warning",
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Chắc chắn!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: "Thành công!",
                            text: "Thực hiện chức năng thành công.",
                            icon: "success"
                        });

                    }
                })
            })
        })
    </script>
@endsection
