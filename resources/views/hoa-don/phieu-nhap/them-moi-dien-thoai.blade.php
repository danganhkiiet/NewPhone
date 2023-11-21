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
                <div class="row row-deck">
                    <div class="col-lg-3 col-md-">
                            <div class="card custom-card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Thông tin phiếu nhập</h3>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex flex-column">
                                        <div class="form-group">
                                            <label class="form-label" for="thong_tin_nguoi_giao">Tên điện thoại</label>
                                            <input class="form-control"  name="ten" id="ten" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="mau_id">Màu sắc</label>
                                            <select name="mau_sac_id" class="form-control form-select" id="mau_sac_id" data-bs-placeholder="Select Country">
                                                @foreach($lst_mau_sac as $mau)
                                                <option value="{{$mau->id}}">{{$mau->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="dung_luong_id">Dung lượng</label>
                                            <select name="dung_luong_id" class="form-control form-select" id="dung_luong_id" data-bs-placeholder="Select Country">
                                                @foreach($lst_dung_luong as $dl)
                                                <option value="{{$dl->id}}">{{$dl->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="thong_so_id">Thông Số</label>
                                            <select name="thong_so_id" class="form-control form-select" id="thong_so_id" data-bs-placeholder="Select Country">
                                                @foreach($lst_thong_so as $dl)
                                                <option value="{{$dl->id}}">{{$dl->ten}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button class="btn btn-primary btn-block" type="button" onclick="themThongSo(document.getElementById('thong_so_id').value,document.getElementById('thong_so_id').options[document.getElementById('thong_so_id').selectedIndex].text )">Thêm thông số</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Giá trị thông số</h3>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">Nhập giá trị các thông số ở đây!!</p>
                                <form class="form-horizontal">
                                    <table class="table border text-nowrap text-md-nowrap table-hover" id="thong-so">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Thông số</th>
                                                <th>Giá trị</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row row-sm">
								<div class="col-lg-12">
									<div class="card custom-card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Hoverable Rows Table</h3>
										</div>
										<div class="card-body">
											<p class="text-muted">To enable hover state on table rows.</p>
											<div class="table-responsive">
												<table class="table border text-nowrap text-md-nowrap table-hover">
													<thead>
														<tr>
															<th>ID</th>
															<th>Name</th>
															<th>Position</th>
															<th>Salary</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>Kevin Powell</td>
															<td>Business Development Associator</td>
															<td>$50,300</td>
														</tr>
													</tbody>
												</table>
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

<script>
    function themThongSo(id,ten)
    {
            // Truy cập bảng
            var table = document.getElementById('thong-so');
            // Tạo một hàng mới
            var newRow = table.insertRow();
            // Tạo các ô (cell) cho hàng mới
            var ID  = newRow.insertCell(0);
            var Ten = newRow.insertCell(1);
            var GiaTri = newRow.insertCell(2);
            var ChucNang = newRow.insertCell(3);
            //Đặt nội dung cho các ô
            ID.innerHTML = '<td><input required readOnly type="text" name="id[]" id="id" value="' + id + '"></td>';;
            Ten.innerHTML = '<td><input required type="text" name="ten[]" id="ten" value="' + ten + '"></td>';
            GiaTri.innerHTML = '<td><input required type="text" name="gia_tri[]" id="gia_tri" value="' + 'Điền giá trị tại đây' + '"></td>';
            ChucNang.innerHTML = '<button class="btn btn-danger" onclick="xoaHang(this)">Xóa</button>';;
    }
    function xoaHang(button) {
                // Lấy hàng chứa nút "Xóa" và xóa hàng đó
                var row = button.parentNode.parentNode;
                row.parentNode.removeChild(row);
            }
</script>