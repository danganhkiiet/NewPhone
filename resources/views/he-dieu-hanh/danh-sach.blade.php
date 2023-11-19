@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Hệ Điều Hành</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Hệ Điều Hành</a></li>
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
                                        <a href="{{ route('he-dieu-hanh.them-moi') }}" class="btn btn-primary-light ">Thêm
                                            mới</a>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($lst_hedieuhanh as $hedieuhanh)
                                                    <tr>
                                                        <td>{{ $hedieuhanh->ten }}</td>
                                                        <td style="width: 100px">
                                                            <a class="btn btn-primary fs-14 text-white edit-icn"
                                                                title="Edit"
                                                                href="{{ route('he-dieu-hanh.cap-nhat', ['id' => $hedieuhanh->id]) }}">
                                                                <i class="fe fe-edit"></i>
                                                            </a>
                                                            <form method="POST" action="{{route('he-dieu-hanh.xoa',['id'=>$hedieuhanh->id])}}">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger fs-14 text-white delete-icn"
                                                                    title="Delete">
                                                                    <i class="fe fe-delete"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{ $lst_hedieuhanh->links() }}
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
