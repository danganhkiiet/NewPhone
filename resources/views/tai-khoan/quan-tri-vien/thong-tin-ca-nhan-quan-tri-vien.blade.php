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
                            <li class="breadcrumb-item active" aria-current="page">Thông Tin Cá Nhân</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Thông Tin</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
                                        <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                            <form method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="control-group form-group">
                                                    <label class="form-label" for="ho_ten">Tên</label>
                                                    <input type="text" class="form-control" name="ho_ten" id="ho_ten"
                                                        value="{{ $admin->ho_ten }}" required>
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="form-label" for="email">Email</label>
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        value="{{ $admin->email }}" required>
                                                </div>
                                                <div class="control-group form-group mb-0">
                                                    <label class="form-label" for="password">Mật Khẩu</label>
                                                    <input type="password" class="form-control" name="password"
                                                        autocomplete="on">
                                                </div>
                                                <div class="control-group form-group">
                                                    <label class="form-label" for="so_dien_thoai">Số điện thoại</label>
                                                    <input type="number" class="form-control" name="so_dien_thoai"
                                                        id="so_dien_thoai" value="{{ $admin->so_dien_thoai }}" required>
                                                </div>
                                                <div class="control-group form-group" style="text-align:center">
                                                    <label class="form-label" for="avatar">Avatar</label>
                                                    <img src="{{ asset($admin->avatar) }}"
                                                        style="width: 55%; height: 8em;" />
                                                    <input type="file" class="form-control" name="avatar"
                                                        id="avatar">
                                                </div>
                                                <button class="btn btn-primary btn-block">Lưu</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->


            </div>
        </div>
    </div>
@endsection
