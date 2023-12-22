@extends('layout')
@section('content')
<div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Phiếu Nhập</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Phiếu nhập</a></li>
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
                                <h3 class="card-title">Thêm mới phiếu nhập</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form method="POST" action="{{route('phieu-nhap.xu-ly-them-moi')}}"> 
                                        @csrf
                                        <div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
                                            <div class="card card-body pd-20 pd-md-40 border shadow-none">
                                                <h4 class="card-title">Thông tin phiếu nhập</h4>
                                                <div class="form-group">
                                                    <label class="form-label" for="thong_tin_nguoi_giao">Thông tin người giao</label>
                                                    <input class="form-control @error('thong_tin_nguoi_giao') is-invalid @enderror"  name="thong_tin_nguoi_giao" id="thong_tin_nguoi_giao" type="text" required>
                                                    @error('thong_tin_nguoi_giao')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
													<label class="form-label" for="nha_cung_cap_id">Nhà cung cấp</label>
													<select name="nha_cung_cap_id" class="form-control form-select  @error('nha_cung_cap_id') is-invalid @enderror" value="1" id="nha_cung_cap_id" data-bs-placeholder="Select Country">
														@foreach($lst_nha_cung_cap as $ncc)
                                                        <option value="{{$ncc->id}}">{{$ncc->ten}}</option>
                                                        @endforeach
													</select>
                                                    @error('nha_cung_cap_id')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
												</div>
                                                <div class="form-group">
													<div class="example">
														<label for="datetimepicker1">Ngày nhập hàng</label>
														<div class="input-group col-md-6 ps-0">
															<div class="input-group-text bg-primary-transparent text-primary">
																<i class="fe fe-calendar text-20"></i>
															</div>
															<input required  class="form-control  @error('ngay_nhap_hang') is-invalid @enderror" id="ngay_nhap_hang" name="ngay_nhap_hang" type="date">
														</div>
                                                        @error('ngay_nhap_hang')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
													</div>
                                                </div>
                                                <button class="btn btn-primary btn-block" type="submit">Tạo hóa đơn mới</button>
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