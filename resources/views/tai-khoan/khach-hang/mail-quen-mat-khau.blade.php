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

        <p>Xin chào,</p>

        <p>Bạn muốn cập nhật lại mật khẩu, vui lòng click vào link ở dưới.</p>

        <a href="{{ route('cap-nhat-mat-khau', ['token' => $token]) }}">Cập Nhật Lại Mật Khẩu</a>

        <p>Đây là một email tự động, vui lòng không phản hồi.</p>

        <footer>
            <p>Trân trọng,</p>
            <p>Đội ngũ NewPhone</p>
        </footer>
    </div>

</body>

</html>
