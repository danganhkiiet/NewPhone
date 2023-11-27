@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Dung Lượng</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Dung Lượng</a></li>
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
                                        <button type="button" class="btn btn-primary btnAdd" data-toggle="modal"
                                            data-target="#myModal">
                                            Thêm Mới
                                        </button>
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
                                        <table class="table editable-table table-nowrap table-bordered table-edit">
                                            <thead>
                                                <tr>
                                                    <th>Tên</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($lst_dluong as $dluong)
                                                    <tr>
                                                        <td>{{ $dluong->ten }}</td>
                                                        <td style="display: flex;">
                                                            <button type="button" class="btn btn-primary btn-edit"
                                                                data-toggle="modal" data-target="#myModal"
                                                                data-id="{{ $dluong->id }}">
                                                                <i class="fe fe-edit"></i>
                                                            </button> 
                                                            <form method="POST"
                                                                action="{{ route('dung-luong.xoa', ['id' => $dluong->id]) }}">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-danger fs-14 text-white delete-icn"
                                                                    title="Delete">
                                                                    <i class="fe fe-delete"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $lst_dluong->links() }}
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
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" id="myForm">
                                                        @csrf
                                                        <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                                            <h4 class="card-title">Nhập thông tin</h4>
                                                            <div class="form-group">
                                                                <input class="form-control" name="id" id="id"
                                                                    type="hidden" required>
                                                                <label class="form-label" for="ten">Họ tên</label>
                                                                <input class="form-control" name="ten" id="ten"
                                                                    type="text" required>
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

            $('.btnAdd').click(function() {
                $('#myForm').trigger('reset');
            })
            $('.btnSave').click(function() {
                // var formData = new FormData($('#myForm')[0]);
                if ($('#id').val() == "") {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('dung-luong.them-moi') }}",
                        data: $('#myForm').serialize(),
                        // data: formData,
                        // contentType: false,
                        // processData: false
                    }).done(function() {
                        location.reload();
                    })
                } else if ($('#id').val() != "") {
                    $.ajax({
                        method: "POST",
                        url: "{{ route('dung-luong.xu-ly-cap-nhat') }}",
                        data: $('#myForm').serialize(),
                    }).done(function() {
                        $('#myModal').modal('hide');
                        location.reload();
                    })
                }

            })
            $('.btn-edit').click(function() {
                var id = $(this).data('id');
                console.log(id);

                $('#id').val(id);
                $.ajax({
                    method: "GET",
                    url: "{{ route('dung-luong.cap-nhat', '') }}/" + id,

                }).done(function($data) {
                    console.log($data);
                    $('#ten').val($data.ten);
                })
            })
        });
    </script>
@endsection
