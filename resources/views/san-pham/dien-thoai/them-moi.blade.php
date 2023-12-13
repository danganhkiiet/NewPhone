@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Điện thoại</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Điện thoại</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới điện thoại</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
                <!-- row -->
                <div class="row row-deck">
                    <div class="col-lg-3 col-md-">
                        <div class="card custom-card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Thông tin điện thoại</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column">
									<div class="form-group">
										<label class="form-label" for="ten">Tên Điện Thoại</label>
										<input class="form-control"  name="ten" id="ten_dien_thoai_id" type="text" required>
									</div>
                                    <div class="form-group">
                                        <label class="form-label" for="nha_san_xuat">Nhà sản xuất</label>
                                        <select class="form-control form-select" id="nha_san_xuat_id" 
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_nha_san_xuat as $ts)
                                                <option value="{{ $ts->id }}">{{ $ts->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label class="form-label" for="nha_san_xuat">Màu sắc</label>
                                        <select class="form-control form-select" id="mau_sac_id" name="mau_sac_id"
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_mau_sac as $ts)
                                                <option value="{{ $ts->id }}">{{ $ts->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
									<div class="form-group">
                                        <label class="form-label" for="nha_san_xuat">Dung Lượng</label>
                                        <select class="form-control form-select" name="dung_luong_id" id="dung_luong_id"
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_dung_luong as $ts)
                                                <option value="{{ $ts->id }}">{{ $ts->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="nha_san_xuat">Thông số</label>
                                        <select class="form-control form-select" name="thong_so_id" id="thong_so_id"
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_thong_so as $ts)
                                                <option value="{{ $ts->id }}">{{ $ts->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
										<label class="form-label" for="ten">Giá Trị</label>
										<input class="form-control"  name="gia_tri" id="gia_tri" type="text" required>
									</div>
                                    <button class="btn btn-primary" id="btn-them">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Danh Sách Thông Số</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ route('dien-thoai.xu-ly-them-moi') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="ten">Hình Ảnh</label>
                                        <input type="file" id="fromFile" required   name="hinh_anh[]" multiple class="form-control" />
                                    </div>
                                    <table class="table border text-nowrap text-md-nowrap table-hover" id="thong-so">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Điện Thoại</th>
                                                <th>Màu</th>
                                                <th>Dung Lượng</th>
                                                <th>Thông số</th>
                                                <th>Giá trị</th>
                                                <th>Nhà Sản Xuất</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary" type="submit">Thêm điện thoại</button>
                                </form>
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
        function xoaHang(button) {
            // Lấy hàng chứa nút "Xóa" và xóa hàng đó
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }
        $(document).ready(function() {
            $('#thong_so_id').change(function() {
                var ten = $("#thong_so_id").find(":selected").text();
                $('#thong-so tr').each(function() {
                var tenthongso = $(this).find('td:eq(4)').text();
                if (tenthongso == ten) {
                        alert('Thông số đã có, vui lòng chọn lại');
                    }
                })
            });
            var stt = 0;
            $("#btn-them").click(function() {
                stt = stt + 1;
                var tendienthoai=$('#ten_dien_thoai_id').val();
                var tenmau = $("#mau_sac_id").find(":selected").text();
                var mau = $('#mau_sac_id').find(':selected').val();
                var tendungluong = $("#dung_luong_id").find(":selected").text();
                var duongluongid = $('#dung_luong_id').find(':selected').val();
                var tenthongso = $("#thong_so_id").find(":selected").text();
                var thongsoid = $('#thong_so_id').find(':selected').val();
                var tengiatri=$('#gia_tri').val();
                var tennhasanxuat= $("#nha_san_xuat_id").find(":selected").text();
                var nhasanxuatid = $('#nha_san_xuat_id').find(':selected').val();

                var flag = false;
                $('#thong-so tr').each(function() {
                var tenMauSac = $(this).find('td:eq(2)').text();
                var tenDungLuong = $(this).find('td:eq(3)').text();
                if (tenMauSac == tenmau && tenDungLuong == tendungluong) {
                        return flag = true;
                    }
                })
                var row = `<tr>
                <td>${stt}</td>
                <td>${tendienthoai}<input type="hidden" name="ten" value="${tendienthoai}"></td>
                `
                if(flag == false)
                {
                row=row+`<td>${tenmau}<input type="hidden" name="mau_sac_id[]" value="${mau}"></td>
                <td>${tendungluong}<input type="hidden" name="dung_luong_id[]" value="${duongluongid}"></td>`
                }
                else
                {
                    row=row+`<td><input type="hidden" name="mau_sac_id[]"></td>
                    <td><input type="hidden" name="dung_luong_id[]"></td>`
                }
                row=row+`
                <td>${tenthongso}<input type="hidden" name="thong_so_id[]" value="${thongsoid}"></td></td>
                <td>${tengiatri}<input type="hidden" name="gia_tri[]" value="${tengiatri}"></td></td>
                <td>${tennhasanxuat}<input type="hidden" name="nha_san_xuat_id" value="${nhasanxuatid}"></td>
                <td><button onclick="xoaHang(this)" class="btn btn-danger">Xóa</button></td>
                </tr>`;

                $("#thong-so").append(row);
           
                //chỉ cho nhập 1 lần 1 điện thoại
                $("#ten_dien_thoai_id").prop("readOnly", true);
                $("#nha_san_xuat_id").prop("disabled", true);
            });
            //kiem tra dien thoai da ton tai chua
            $('#ten_dien_thoai_id').change(function() {
                var productName = $(this).val();
                $.ajax({
                    url: "{{ route('dien-thoai.kiem-tra-ton-tai') }}",
                    type: 'GET',
                    data: {
                        'ten': productName
                    },
                }).done(function(response){
                    if(response.flag){
                        alert("sản phẩm đã tồn tại, vui lòng nhập lại!!")
                        $('#ten_dien_thoai_id').val(""); // Gán lại giá trị rỗng cho input
                    }
                });
            });
        });
    </script>
@endsection

