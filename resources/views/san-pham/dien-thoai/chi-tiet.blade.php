@extends('layout')
@section('content')
    <div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Chi Tiết Điện Thoại</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Điện Thoại</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dien-thoai.danh-sach') }}">Danh Sách</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Danh Sách</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->

                <!-- Thong bao -->
                @if(session('thong_bao'))
                <div class="alert alert-success alert-dismissible fade show p-0 mb-4" role="alert">
                    <p class="py-3 px-5 mb-0 border-bottom border-bottom-success-light">
                        <span class="alert-inner--icon me-2"><i class="fe fe-thumbs-up"></i></span>
                        <strong>Thành công</strong>
                    </p>
                    <p class="py-3 px-5"> {{session('thong_bao')}}</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <!-- ket thuc thong bao -->
                <!-- Row -->
                <div class="row">
                    <div class="row row-sm">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h3 class="card-title">Chi Tiết</h3>
                                    <div class="btn"  style="position: relative;left: 78%;">
                                        <a href="{{ route('dien-thoai.them-moi') }}" class="btn btn-primary-light ">Thêm mới</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table border text-nowrap text-md-nowrap table-hover">
                                            <thead>
                                                <tr>
                                                    <th>STT</th>
                                                    <th>Tên điện thoại</th>
                                                    <th>Màu sắc</th>
                                                    <th>Dung lượng</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá bán</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-deck">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Danh Sách Ảnh Sản Phẩm</h3>
                                <input id="uploadInput" multiple  type="file" style="display: none;" accept="image/*">
                                <button id="btn-them-moi" class="btn btn-primary" style="position: relative;left: 50%;">
                                    Thêm mới
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="carousel-controls" class="carousel slide" data-bs-ride="carousel">
                                    
                                    <div class="carousel-inner">
                                            @foreach($lst_hinh_anh as $key => $ha)
                                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                    <img class="d-block w-100" alt="" src="{{ asset($ha->duong_dan) }}" data-bs-holder-rendered="true">
                                                </div>
                                            @endforeach
                                    </div>
                                    
                                    <a class="carousel-control-prev" href="#carousel-controls" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>

                                    <a class="carousel-control-next" href="#carousel-controls" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card custom-card">
                            <div class="card-header border-bottom">
                                <h3 class="card-title">Mô Tả</h3>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column">
                                    <form>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->
            </div>
        </div>
    </div>
@endsection
@section('js-jquery')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Lấy ID từ localStorage
            var id = localStorage.getItem('ID_dien_thoai');
            //tạo chuỗi urlchi_tiet_
            var url = "{{ route('dien-thoai.xem-chi-tiet', ['id' => ':id']) }}";
            //thay thế :id bằng biến id lấy từ local
            url = url.replace(':id', id);
            var table = $('#myTable').DataTable({
                ajax: {
                    url: url,
                    type:"GET"
                },
                processing:true,
                serverSide:true,
                columns:[
                    {
                        data: "DT_RowIndex",
                        name:"DT_RowIndex",
                    },
                    {
                        data: "dien_thoai_id",
                        name:"dien_thoai_id",
                    },
                    {
                        data: "mau_sac_id",
                        name:"mau_sac_id",
                    },
                    {
                        data: "dung_luong_id",
                        name:"dung_luong_id",
                    },
                    {
                        data: "so_luong",
                        name:"so_luong",
                    },
                    {
                        data: "gia_ban",
                        name:"gia_ban",
                    },
                ],
                "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "pageLength": 5,
                    "lengthMenu": [5, 10, 50, 100],
                    "language": {
                        // "sInfo": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                        "sInfo": "",
                        "sInfoEmpty": "Hiển thị 0 đến 0 của 0 mục",
                        "sInfoFiltered": "(được lọc từ tổng số _MAX_ mục)",
                        "sLengthMenu": "Hiển thị _MENU_ mục",
                        "sSearch": "Tìm kiếm:",
                        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
                        "oPaginate": {
                            "sFirst": "Đầu",
                            "sLast": "Cuối",
                            "sNext": "Tiếp",
                            "sPrevious": "Trước"
                        }
                    },
                    "search": {
                        "input": '<input type="text" class="form-control" name="ten" placeholder="Nhập tên" />'
                    },
            })
            //Bắt sự kiện khi một hàng được chọn trong DataTables
            $('#myTable tbody').on('click', 'tr', function () {
                var data = table.row(this).data();
                var id = data['id']; // Giả sử ID của hàng được lưu trong cột 'id'
                
                // Lưu ID vào localStorage
                localStorage.setItem('ID_dien_thoai', id);
            });
            //bật input files từ button them mới
            $("#btn-them-moi").on('click',function() {  
                $('#uploadInput').click();
            });

            //bắt thay đổi thẻ input khi chọn file
            $('#uploadInput').change(function() {
                // Lấy danh sách các file ảnh đã được chọn
                var selectedFiles = this.files;
                console.log(selectedFiles);
                $.ajax({
                    method: "GET",
                    url: "{{ route('dien-thoai.them-hinh-anh') }}",
                    data: {
                        id: id,
                        data: selectedFiles
                    },
                    processData: false,
                            contentType: false,
                   
                }).done(function(response) {
                    console('hehe');
                })
            });
            function updateCarousel(images) {
                // Xóa các carousel-item hiện tại
                $('.carousel-inner').empty();
                
                // Thêm các carousel-item mới từ danh sách hình ảnh
                images.forEach(function(image, index) {
                    var activeClass = index === 0 ? 'active' : ''; // Xác định carousel-item đầu tiên
                    
                    var carouselItem = `
                        <div class="carousel-item ${activeClass}">
                            <img class="d-block w-100" src="${image.src}" alt="${image.alt}">
                        </div>
                    `;
                    $('.carousel-inner').append(carouselItem);
                });
            }
        });

    </script>
@endsection

