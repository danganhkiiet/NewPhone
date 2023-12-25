<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />

</head>

<body>
    <form method="POST" action="{{ route('xu-ly-cap-nhat-mat-khau')}}">
        @csrf
        <div class="card text-center" style="width: 300px;">
            <div class="card-header h5 text-white bg-primary">Cập Nhật Mật Khẩu</div>
            <div class="card-body px-5">
                <p class="card-text py-2">
                    Vui lòng điền lại mật khẩu
                </p>
                <!-- ... Các trường và nút submit ... -->
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-outline">
                    <input type="password" id="password" name="password" class="form-control my-3" />
                    <label class="form-label" for="typePassword">Nhập mật khẩu</label>
                </div>
                <div class="form-outline">
                    <input type="password" id="xacnhanmatkhau" name="xacnhanmatkhau" class="form-control my-3" />
                    <label class="form-label" for="typeConfirmPassword">Xác nhận mật khẩu</label>
                </div>
                <button type="submit">Xác Nhận</button>
            </div>
        </div>
    </form>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
</body>

</html>
