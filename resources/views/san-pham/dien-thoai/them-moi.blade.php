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
                                <h3 class="card-title">Thông số điện thoại</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column">
                                    <div class="form-group">
                                        <label class="form-label" for="ten">Tên Điện Thoại</label>
                                        <input class="form-control" name="ten" id="ten_dien_thoai_id" type="text"
                                            required>
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
                                        <input class="form-control" name="gia_tri" id="gia_tri" type="text" required>
                                    </div>
                                    <button class="btn btn-primary" id="btn-them-bang1">Thêm</button>
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
                                <form class="form-horizontal" id="myForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="ten">Hình Ảnh</label>
                                        <input type="file" id="fromFile" required name="hinh_anh[]" multiple
                                            class="form-control" />
                                    </div>
                                </form>
                                <table class="table border text-nowrap text-md-nowrap table-hover" id="thong-so">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên Điện Thoại</th>
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
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- row -->
                <div class="row row-deck">
                    <div class="col-lg-3 col-md-">
                        <div class="card custom-card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Màu Dung Lượng điện thoại</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column">
                                    <div class="form-group">
                                        <label class="form-label" for="ram">Tên Ram</label>
                                        <select class="form-control form-select" id="ram_id"
                                            data-bs-placeholder="Select Country">
                                            @foreach ($lst_ram as $ts)
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
                                    <button class="btn btn-primary" id="btn-them-bang2">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Danh Sách Màu Dung Lượng</h3>
                            </div>
                            <div class="card-body">

                                <table class="table border text-nowrap text-md-nowrap table-hover"
                                    id="bang-mau-dung_luong">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Ram</th>
                                            <th>Màu</th>
                                            <th>Dung Lượng</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        </tr>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary btn-ThemDienThoai" type="submit">Thêm điện thoại</button>
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
            var ten = "";
            var thong_so_id = [];
            var gia_tri = [];
            var nha_san_xuat_id = "";
            var mau_sac_id = [];
            var dung_luong_id = [];
            var ram_id = [];
            // Hàm xóa hàng

            $('#thong_so_id').change(function() {
                var ten = $("#thong_so_id").find(":selected").text();
                $('#thong-so tr').each(function() {
                    var tenthongso = $(this).find('td:eq(4)').text();
                    if (tenthongso == ten) {
                        alert('Thông số đã có, vui lòng chọn lại');
                    }
                });
            });

            var stt1 = 0;
            var stt2 = 0;

            $("#btn-them-bang1").click(function() {
                var tendienthoai = $('#ten_dien_thoai_id').val();
                var tenthongso = $("#thong_so_id").find(":selected").text();
                var thongsoid = $('#thong_so_id').find(':selected').val();
                var tengiatri = $('#gia_tri').val();
                var tennhasanxuat = $("#nha_san_xuat_id").find(":selected").text();
                var nhasanxuatid = $('#nha_san_xuat_id').find(':selected').val();


                if ($('#ten_dien_thoai_id').val() == "") {
                    Swal.fire({
                        title: "Tên điện thoại",
                        text: "Vui lòng không để trống?",
                        icon: "error"
                    });
                    return;
                }
                if ($('#gia_tri').val() == "") {
                    Swal.fire({
                        title: "Giá trị",
                        text: "Vui lòng không để trống?",
                        icon: "error"
                    });
                    return;
                }
                // Kiểm tra xem giá trị đã tồn tại trong bảng chưa
                var isExist = false;
                $("#thong-so tbody tr").each(function() {
                    var existingGiaTri = $(this).find("td:eq(3)").text();

                    if (existingGiaTri == tengiatri) {
                        isExist = true;
                        return false; // Thoát khỏi vòng lặp nếu đã tồn tại giá trị
                    }
                });

                // Nếu giá trị chưa tồn tại, thì mới thêm vào
                if (!isExist) {
                    ten = tendienthoai;
                    thong_so_id.push(thongsoid);
                    gia_tri.push(tengiatri);
                    nha_san_xuat_id = nhasanxuatid;
                    stt1 = stt1 + 1;
                    var row = `<tr>
                        <td>${stt1}</td>
                        <td>${tendienthoai}</td>
                        <td>${tenthongso}</td>
                        <td>${tengiatri}</td>
                        <td>${tennhasanxuat}</td>
                        <td><button class="btn btn-danger btn-xoa" onclick="xoaHang(this)">Xóa</button></td>
                    </tr>`;

                    $("#thong-so tbody").append(row);

                    // Chỉ cho nhập 1 lần 1 điện thoại
                    $("#ten_dien_thoai_id").prop("readOnly", true);
                    $("#nha_san_xuat_id").prop("disabled", true);
                } else {
                    // Hiển thị thông báo hoặc thực hiện hành động phù hợp khi giá trị đã tồn tại
                    Swal.fire({
                        title: "Giá Trị",
                        text: "Đã tồn tại trong bảng. Vui lòng chọn giá trị thông số khác.?",
                        icon: "error"
                    });
                    return;
                }
            });


            $("#btn-them-bang2").click(function() {
                var tenmau = $("#mau_sac_id").find(":selected").text();
                var mau = $('#mau_sac_id').find(':selected').val();
                var tenram = $("#ram_id").find(":selected").text();
                var ramid = $('#ram_id').find(':selected').val();
                var tendungluong = $("#dung_luong_id").find(":selected").text();
                var dungluongid = $('#dung_luong_id').find(':selected').val();

                // Kiểm tra xem giá trị đã tồn tại trong bảng chưa
                var isExist = false;
                $("#bang-mau-dung_luong tbody tr").each(function() {
                    var existingMau = $(this).find("td:eq(1)").text();
                    var existingDungLuong = $(this).find("td:eq(2)").text();

                    if (existingMau == tenmau && existingDungLuong == tendungluong) {
                        isExist = true;
                        return false; // Thoát khỏi vòng lặp nếu đã tồn tại giá trị
                    }
                });

                // Nếu giá trị chưa tồn tại, thì mới thêm vào
                if (!isExist) {
                    mau_sac_id.push(mau);
                    dung_luong_id.push(dungluongid);
                    ram_id.push(ramid);
                    stt2 = stt2 + 1;
                    var row = `<tr>
                    <td>${stt2}</td>
                    <td>${tenram}</td>
                    <td>${tenmau}</td>
                    <td>${tendungluong}</td>
                    <td><button onclick="xoaHang(this)" class="btn btn-danger">Xóa</button></td>
                    </tr>`;

                    $("#bang-mau-dung_luong tbody").append(row);
                } else {
                    Swal.fire({
                        title: "Màu và Dung Lượng",
                        text: "Đã tồn tại trong bảng. Vui lòng chọn màu và dung lượng khác.?",
                        icon: "error"
                    });
                    return;
                }
            });


            $(".btn-ThemDienThoai").click(function() {
                if ($('#fromFile').val() == "") {
                    Swal.fire({
                        title: "Hình Ảnh",
                        text: "Vui lòng không để trống?",
                        icon: "error"
                    });
                    return;
                } else {
                    var frm_Data = new FormData($('#myForm')[0]);
                    frm_Data.append('nha_san_xuat_id', nha_san_xuat_id);
                    frm_Data.append('ten', ten);

                  
                    for (var i = 0; i < thong_so_id.length; i++) {
                        frm_Data.append('thong_so_id[]', thong_so_id[i]);
                        frm_Data.append('gia_tri[]', gia_tri[i]);
                     
                    }

                    for (var i = 0; i < mau_sac_id.length; i++) {
                        frm_Data.append('mau_sac_id[]', mau_sac_id[i]);
                        frm_Data.append('dung_luong_id[]', dung_luong_id[i]);
                        frm_Data.append('ram_id[]', ram_id[i]);
                    }

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        type: 'POST',
                        url: "{{ route('dien-thoai.xu-ly-them-moi') }}",
                        data: frm_Data,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            // Xử lý kết quả thành công nếu cần
                            console.log(response);

                            // Reload trang sau khi thêm điện thoại thành công
                            location.reload();
                        },
                        error: function(error) {
                            // Xử lý lỗi nếu có
                            console.error(error);
                        }
                    });
                }

            });

            // Kiểm tra điện thoại đã tồn tại chưa
            $('#ten_dien_thoai_id').change(function() {
                var productName = $(this).val();
                $.ajax({
                    url: "{{ route('dien-thoai.kiem-tra-ton-tai') }}",
                    type: 'GET',
                    data: {
                        'ten': productName
                    },
                }).done(function(response) {
                    if (response.flag) {
                        alert("Sản phẩm đã tồn tại, vui lòng nhập lại!!");
                        $('#ten_dien_thoai_id').val(""); // Gán lại giá trị rỗng cho input
                    }
                });
            });


        });
    </script>
@endsection
