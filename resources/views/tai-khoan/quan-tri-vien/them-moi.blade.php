@extends('layout')
@section('content')
    
<div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Tài Khoản</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('nha-cung-cap.danh-sach') }}">Tài Khoản</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
            <!-- row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Thêm mới</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
                                            <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                                <h4 class="card-title">Nhập thông tin</h4>
                                                <div class="form-group">
                                                    <label class="form-label" for="ten">Họ tên</label>
                                                    <input class="form-control"  name="ho_ten" id="ten" type="text" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="Email">Email</label>
                                                    <input class="form-control" name="email" id="Email" type="email"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="Password">Password</label>
                                                    <input class="form-control" name="password" id="Password" type="password"  required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="so_dien_thoai">Số Điện Thoại</label>
                                                    <input class="form-control" name="so_dien_thoai" id="so_dien_thoai" type="tel"  required>
                                                </div>
                                                <div class="form-group">
                                                    <h3 class="card-title">Avatar</h3>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div>
                                                                    <input id="demo" type="file" name="avatar" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-block" type="submit">Tạo mới</button>
                                            </div>
                                        </div>
                                    </form>
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
