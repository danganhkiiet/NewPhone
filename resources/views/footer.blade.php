<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-12 col-sm-12 text-center">
                © <span id="currentYear"></span> <a href="#">NewPhone</a>. Được thiết kế <span
                    class="fa fa-heart text-danger"></span> bởi <a href="#"> Kiệt Khanh Hiếu </a>

            </div>
        </div>
    </div>
    <script>
        // Lấy năm hiện tại
        var currentYear = new Date().getFullYear();

        // Đặt giá trị năm vào thẻ span
        document.getElementById('currentYear').innerHTML = currentYear;
    </script>
</footer>
