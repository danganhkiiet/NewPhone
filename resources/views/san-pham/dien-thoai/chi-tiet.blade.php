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
                            {{-- <li class="breadcrumb-item"><a href="{{ route('dien-thoai.danh-sach') }}">Danh Sách</a></li> --}}
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
                                    Thêm ảnh mới
                                </button>
                            </div>
                            <div class="card-body">
                                <div id="carousel-controls" class="carousel slide" data-bs-ride="carousel">
                                    
                                    <div class="carousel-inner" id="carousel_hinh_anh">
                                            @foreach($lst_hinh_anh as $key => $ha)
                                                <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                                    <img class="d-block w-100" alt="" src="{{ asset($ha->duong_dan) }}" onclick="confirmDelete( {{ $ha->id }} )" data-bs-holder-rendered="true">
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
                                    <form method="POST" class="form-gourp" id="mo_ta_form" action="{{ route('dien-thoai.cap-nhat-mo-ta',['id' => $dien_thoai->id]) }}" >
                                        @csrf
                                        <textarea name="mo_ta" id="summernote">{{ $dien_thoai->mo_ta }}</textarea>
                                        <button  type="submit" class="btn btn-danger form-control" > Cập Nhật </button>
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
    <!-- INTERNAL Summernote Editor js -->
    <script src="../assets/plugins/summernote-editor/summernote1.js"></script>
    <script src="../assets/js/summernote.js"></script>
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
                Swal.fire({
                    title: "Bạn có chắc không?",
                    text: "Thêm ảnh mới vào sản phẩm này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Chắc chắn!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Lấy danh sách các file ảnh đã được chọn
                        var selectedFiles = this.files;

                        var formData = new FormData();
                        formData.append('id', localStorage.getItem('ID_dien_thoai')); // Thêm ID vào formData
                        // Thêm tất cả các file đã chọn vào FormData
                        for (var i = 0; i < selectedFiles.length; i++) {
                            formData.append('images[]', selectedFiles[i]);
                        }

                        $.ajax({
                            method: "POST",
                            url: "{{ route('dien-thoai.them-hinh-anh') }}",
                            data: formData,
                            processData: false, // không xử lý dữ liệu gửi đi
                            contentType: false, // không đặt kiểu dữ liệu gửi đi
                            success: function(response) {
                                // Nếu tải lên thành công
                                Swal.fire({
                                title: "Thành công!",
                                text: "Thực hiện chức năng thành công.",
                                icon: "success"
                                });

                                var carouselInner = $('#carousel_hinh_anh');
                                carouselInner.empty(); // Xóa nội dung hiện tại của carousel

                                // Tạo và thêm các carousel-item mới từ dữ liệu trong response.lst_hinh_anh
                                $.each(response.lst_hinh_anh, function(key, item) {
                                    var activeClass = key === 0 ? 'active' : ''; // Xác định carousel-item đầu tiên

                                    var carouselItem = `
                                        <div class="carousel-item ${activeClass}">
                                        <img class="d-block w-100" src="{{ asset('${item.duong_dan}') }}"  onclick="confirmDelete(${item.id})" alt="" data-bs-holder-rendered="true">
                                        </div>
                                    `;
                                    
                                    carouselInner.append(carouselItem); // Thêm carousel-item vào carousel
                                });

                            },
                            error: function(xhr) {
                                // Xử lý lỗi nếu có
                                console.log(xhr.responseText);
                            }
                    
                        });
                    }
                    else
                    {
                        $('#uploadInput').empty();
                    }
                })
            });
        });

        function confirmDelete(id) {
            Swal.fire({
                    title: "Bạn có chắc không?",
                    text: "Xóa ảnh này!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Chắc chắn!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        var id_dien_thoai = localStorage.getItem('ID_dien_thoai');
                        $.ajax({
                            method: "POST",
                            url: "{{ route('dien-thoai.xoa-hinh-anh') }}",
                            data: {
                                id : id,
                                id_dien_thoai: id_dien_thoai

                            },
                            success: function(response) {
                                // Nếu tải lên thành công
                                Swal.fire({
                                title: "Thành công!",
                                text: "Thực hiện chức năng thành công.",
                                icon: "success"
                                });

                                var carouselInner = $('#carousel_hinh_anh');
                                carouselInner.empty(); // Xóa nội dung hiện tại của carousel

                                // Tạo và thêm các carousel-item mới từ dữ liệu trong response.lst_hinh_anh
                                $.each(response.lst_hinh_anh, function(key, item) {
                                    var activeClass = key === 0 ? 'active' : ''; // Xác định carousel-item đầu tiên

                                    var carouselItem = `
                                        <div class="carousel-item ${activeClass}">
                                        <img class="d-block w-100" src="{{ asset('${item.duong_dan}') }}"  onclick="confirmDelete(${item.id})" alt="" data-bs-holder-rendered="true">
                                        </div>
                                    `;
                                    
                                    carouselInner.append(carouselItem); // Thêm carousel-item vào carousel
                                });
                            },
                            error: function(xhr) {
                                // Xử lý lỗi nếu có
                                console.log(xhr.responseText);
                            }
                    
                        });
                    }
                })
        }
    </script>
@endsection

