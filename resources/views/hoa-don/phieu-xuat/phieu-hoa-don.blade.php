<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Thông Tin Người Cần Giao</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table editable-table table-nowrap table-bordered table-edit ">
                                <thead>
                                    <tr>
                                        <th>Tên Khách Hàng</th>
                                        <th>Địa Chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Trạng thái thanh toán</th>
                                        <th>Tổng tiền</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        
                                        <th>{{ $khach_hang->ten }}</th>
                                        <th>{{ $khach_hang->dia_chi }}</th>
                                        <th>{{ $khach_hang->so_dien_thoai }}</th>
                                        <th>{{ $phieu_xuat->trang_thai_don_hang_id === 3 ? "Vận Chuyển" : "" }}</th>
                                        <th>{{ $phieu_xuat->trang_thai_thanh_toan===1?"Đã thanh toán":"Chưa thanh toán" }}</th>
                                        <th>{{ $phieu_xuat->tong_tien }}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row row-sm">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <h3 class="card-title">Chi Tiết Phiếu Xuất Vận Chuyển</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table editable-table table-nowrap table-bordered table-edit ">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên điên thoại</th>
                                        <th>Màu sắc</th>
                                        <th>Dung lượng</th>
                                        <th>Số lượng</th>
                                        <th>Giá bán</th>
                                        <th>Thành tiền</th>
                                    </tr>

                                </thead>
                                
                                <tbody>
                                    {{$i=0}}
                                    @foreach ($chi_tiet_phieu_xuat as $ctpx)
                                        <tr>
                                            <th>{{$i=$i+1}}</th>
                                            <th>{{ $ctpx->chi_tiet_dien_thoai->dienThoai->ten }}</th>
                                            <th>{{ $ctpx->chi_tiet_dien_thoai->mauSac->ten }}</th>
                                            <th>{{ $ctpx->chi_tiet_dien_thoai->dungLuong->ten }}</th>
                                            <th>{{ $ctpx->so_luong }}</th>
                                            <th>{{ $ctpx->gia_ban }}</th>
                                            <th>{{ $ctpx->thanh_tien }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
