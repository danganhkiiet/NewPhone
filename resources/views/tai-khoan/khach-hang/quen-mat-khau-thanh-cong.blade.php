<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mã xác nhận đăng ký</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            text-align: center;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        strong {
            color: #007bff;
        }

        footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- Thong bao -->
        @if (session('thong_bao'))
            <div class="alert alert-success alert-dismissible fade show p-0 mb-4" role="alert">
                <p class="py-3 px-5 mb-0 border-bottom border-bottom-success-light">
                    <span class="alert-inner--icon me-2"><i class="fe fe-thumbs-up"></i></span>
                    <strong>Thành công</strong>
                </p>
                <p class="py-3 px-5" style="color: green"> {{ session('thong_bao') }}</p>
            </div>
        @endif
        <!-- ket thuc thong bao -->
        <p>Cảm ơn,</p>

        <p>Bạn đổi mật khẩu thành công.</p>


        <p>Có thể quay lại web đăng nhập.</p>

        <footer>
            <p>Trân trọng,</p>
            <p>Đội ngũ NewPhone</p>
        </footer>
    </div>

</body>

</html>
