@extends('layout')
@section('content')
    
<div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Khách Hàng</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('khach-hang.danh-sach') }}">Khách Hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END --><!-- row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Cập nhật thông tin khách hàng</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <form method="POST" action="">
                                            @csrf
                                            <div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
                                                <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                                    <h4 class="card-title">Nhập thông tin</h4>
                                                    <div class="form-group">
                                                        <label class="form-label" for="ten">Họ tên</label>
                                                        <input class="form-control"  name="ten" id="ten" value="{{$khach_hang->ten }}" type="text" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="dia_chi">Địa chỉ</label>
                                                        <input class="form-control"  name="dia_chi" value="{{$khach_hang->dia_chi }}"  id="dia_chi" type="text" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="email">Email</label>
                                                        <input class="form-control" name="email" id="email"  value="{{$khach_hang->email }}" type="email"  required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label" for="so_dien_thoai">Số điện thoại</label>
                                                        <input class="form-control"  name="so_dien_thoai" value="{{$khach_hang->so_dien_thoai }}"  pattern="[0-9]{10}" id="so_dien_thoai" type="tel" required>
                                                    </div>

                                                    <button class="btn btn-primary btn-block" type="submit">Cập nhật</button>
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
