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
                    <div class="table-responsive">
                        <table class="table border text-nowrap text-md-nowrap table-hover">
                            <thead>
                                <tr>
                                    <th>Màu</th>
                                    <th>Dung Lượng</th>
                                    <th>Số Lượng</th>
                                    <th>Giá Bán</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lst_chi_tiet_dien_thoai as $ts)
                                    <tr>
                                        <td>{{$ts->mauSac->ten}}</td>
                                        <td>{{$ts->dungLuong->ten}}</td>
                                        <td>{{$ts->so_luong}}</td>
                                        <td>
                                            <a class="btn btn-primary fs-14 text-white edit-icn"
                                                title="Edit" href="{{ route('dien-thoai.cap-nhat',['id' => $ts->id]) }}" >
                                                {{$ts->gia_ban}}
                                                <i class="fe fe-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                  
                    </div>
                </div>
                <!-- /row -->
        </div>
    </div>
</div>
@endsection


