@extends('layout')
@section('content')
    
<div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Điện Thoại</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dien-thoai.danh-sach') }}">Điện Thoại</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cập nhật thông tin</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- Row -->
                <div class="row row-deck">
                    <div class="col-lg-3 col-md-">
                        <div class="card custom-card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Thông tin điện thoại</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column">
                               
                                    @csrf
									<div class="form-group">
										<label class="form-label" for="ten">Tên Điện Thoại</label>
										<input class="form-control"  name="ten" id="ten_dien_thoai_id" value="{{ $dien_thoai->ten }}" type="text" required>
									</div>
									<div class="form-group">
										<label class="form-label" for="ten">Giá bán</label>
										<input class="form-control"  name="gia_ban" id="gia_ban" value="{{ $chi_tiet_dien_thoai->gia_ban }}" type="text" required>
									</div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <form method="POST" action="" enctype="multipart/form-data">
                            @csrf
							<div class="col-md-12">
								<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Mô tả</h3>
										</div> 
										<div class="card-body">
											<input name="mo_ta" type="summernote" id="summernote" />
										</div>
								</div>
							</div>
                            <button class="btn btn-danger" type="submit"> Cập Nhật </button>
                            </form>
                        </div>
                <!-- /row -->
        </div>
    </div>
</div>
@endsection

