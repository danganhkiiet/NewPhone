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
        <h1>Mã xác nhận đăng ký</h1>

        <p>Xin chào,</p>

        <p>Cảm ơn bạn đã đăng ký, đây là mã xác nhận của bạn.</p>

        <p>Vui lòng không chia sẽ mã dưới mọi hình thức: <strong>{{ $token }}</strong></p>

        <p>Đây là một email tự động, vui lòng không phản hồi.</p>

        <footer>
            <p>Trân trọng,</p>
            <p>Đội ngũ NewPhone</p>
        </footer>
    </div>

</body>
</html>
