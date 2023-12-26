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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form method="POST" action="{{ route('xu-ly-cap-nhat-mat-khau') }}" style="margin: 12% 0% 0% 40%;">
        @csrf
        <div class="card text-center" style="width: 300px;">
            <div class="card-header h5 text-white bg-primary">Cập Nhật Mật Khẩu</div>
            <div class="card-body px-5">
                <!-- ... Các trường và nút submit ... -->
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-outline">
                    <input type="password" id="Password" name="password" class="form-control my-3" />
                    <label class="form-label" for="typePassword">Nhập mật khẩu</label>
                </div>
                <div class="form-outline">
                    <input type="password" id="xacnhanmatkhau" name="xacnhanmatkhau" class="form-control my-3" />
                    <label class="form-label" for="typeConfirmPassword">Xác nhận mật khẩu</label>
                </div>
                <button type="submit" class="btn-click">Xác Nhận</button>
            </div>
        </div>
    </form>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
</body>
</html>
