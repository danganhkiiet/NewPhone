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
                            <li class="breadcrumb-item"><a href="#">Thêm mới phiếu nhập</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới sản phẩm</li>
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
                                        <label class="form-label" for="nha_san_xuat">Nhà sản xuất</label>
                                        <select class="form-control form-select" id="nha_san_xuat_id"
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_nha_san_xuat as $nhasanxuat)
                                                <option value="{{ $nhasanxuat->id }}"
                                                    data-nhasanxuat="{{ $nhasanxuat->id }}">{{ $nhasanxuat->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="dien_thoai">Điện Thoại</label>
                                        <select name="dien_thoai_id" class="form-control form-select" id="dien_thoai_id"
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_dien_thoai as $dienthoai)
                                                <option value="{{ $dienthoai->id }}">{{ $dienthoai->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="mau_id">Màu sắc</label>
                                        <select name="mau_sac_id" class="form-control form-select" id="mau_sac_id"
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_mau_sac as $mau)
                                                <option value="{{ $mau->id }}">{{ $mau->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="dung_luong_id">Dung lượng</label>
                                        <select name="dung_luong_id" class="form-control form-select" id="dung_luong_id"
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_dung_luong as $dungluong)
                                                <option value="{{ $dungluong->id }}">{{ $dungluong->ten }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="SoLuong">Số Lượng</label>
                                    </div>
                                    <td>
                                        <input type="number" name="so_luong" id="so_luong"
                                            class="form-control text-center" value="1" required>
                                    </td>
                                    <div class="form-group">
                                        <label class="form-label" for="GiaNhap">Giá Nhập</label>
                                    </div>
                                    <td>
                                        <input type="number" name="gia_nhap" id="gia_nhap"
                                            class="form-control text-center" value="1" required>
                                    </td>
                                    <div class="form-group">
                                        <label class="form-label" for="GiaBan">Giá Bán</label>
                                    </div>
                                    <td>
                                        <input type="number" name="gia_ban" id="gia_ban" class="form-control text-center"
                                            value="1" required>
                                    </td>
                                    <!-- {{-- <button class="btn btn-primary btn-block" type="button" onclick="themThongSo(document.getElementById('thong_so_id').value,document.getElementById('thong_so_id').options[document.getElementById('thong_so_id').selectedIndex].text )">Thêm thông số</button> --}} -->
                                    <button class="btn btn-primary" id="btn-them">Thêm điện thoại</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Danh Sách Điện thoại</h3>
                            </div>
                            <div class="card-body">
                                <form class="form-horizontal" method="POST">
                                    @csrf
                                    <table class="table border text-nowrap text-md-nowrap table-hover" id="phieu-nhap">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Điện Thoại</th>
                                                <th>Màu</th>
                                                <th>Dung Lượng</th>
                                                <th>Số Lượng</th>
                                                <th>Giá nhập</th>
                                                <th>Giá Bán</th>
                                                <th>Thành Tiền</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <button class="btn btn-primary" type="submit">Hoàn thành phiếu nhập</button>
                                </form>
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
                var stt = 0;
                $("#btn-them").click(function() {
                    if ($("#so_luong").val() == "" || $("#gia_ban").val()=="" || $("#gia_nhap").val()=="") {
                        Swal.fire({
                            title: "Lỗi?",
                            text: "Vui lòng không thể để trống!",
                            icon: "error",
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Chắc chắn!"
                        })

                    } else {
                        stt = stt + 1;
                        var tenmau = $("#mau_sac_id").find(":selected").text();
                        var mau = $('#mau_sac_id').find(':selected').val();
                        var tendienthoai = $("#dien_thoai_id").find(":selected").text();
                        var dienthoai = $('#dien_thoai_id').find(':selected').val();
                        var dungluong = $("#dung_luong_id").find(":selected").text();
                        var duongluongid = $('#dung_luong_id').find(':selected').val();
                        var soluong = $("#so_luong").val();
                        var gianhap = $("#gia_nhap").val();
                        var giaban = $("#gia_ban").val();
                        var thanhtien = soluong * gianhap;


                        var row = `<tr>
                        <td>${stt}</td>
                        <td>${tendienthoai}<input type="hidden" name="dien_thoai_id[]" value="${dienthoai}"></td>
                        <td>${tenmau}<input type="hidden" name="mau_sac_id[]" value="${mau}"></td>
                        <td>${dungluong}<input type="hidden" name="dung_luong_id[]" value="${duongluongid}"></td>
                        <td>${soluong}<input type="hidden" name="so_luong[]" value="${soluong}"></td></td>
                        <td>${gianhap}<input type="hidden" name="gia_nhap[]" value="${gianhap}"></td></td>
                        <td>${giaban}<input type="hidden" name="gia_ban[]" value="${giaban}"></td></td>
                        <td>${thanhtien}</td>
                        <td><button onclick="xoaHang(this)" class="btn btn-danger">Xóa</button></td>
                        </tr>`;

                        $("#phieu-nhap").append(row);
                    }

                });

                $("#nha_san_xuat_id").change(function() {
                    var nha_san_xuat_id = $(this).val();
                    console.log(nha_san_xuat_id);
                    $.ajax({
                        method: "GET",
                        url: "{{ route('phieu-nhap.danh-sach-dien-thoai-theo-nha-san-xuat') }}",
                        data: {
                            nha_san_xuat_id: nha_san_xuat_id
                        },
                    }).done(function(response) {
                        console.log(response)
                        $("#dien_thoai_id").empty();

                        // Thêm các option mới từ dữ liệu trả về
                        $.each(response, function(key, item) {
                            $("#dien_thoai_id").append('<option value="' + item.id + '">' +
                                item.ten + '</option>');
                        });
                    })
                });
            });
        </script>
    @endsection
