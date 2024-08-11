<?php
    $this->disableAutoLayout();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Confirm cancel order</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="./css/Cancel_Order/confirm_cancel_order.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row px-xl-5" style="display: block;">
            <br>
            <h2 class="order-header">Xác nhận cancel order</h2>

            <div class="order-info">
                <h5>✅ Thông tin sản phẩm</h5>
                <div class="order-details">
                    <p>Mã số order 
                    <br>XXXXXXXXXX</p>
                    <p style="width: 68%;">Ngày đặt hàng 
                    <br>XXXXXXXXXX</p>
                    <p>Trạng thái đơn hàng: Đã hoàn thành</p>
                </div>
                <div class="order-item">
                    <div class="order-details">
                        <img src="img/product-1.jpg" alt="Product Image">
                        <div style="width: 80%;">
                            <h5>Tên sản phẩm nhạc cụ</h5>
                            <p>Phân loại hàng: XXXXX</p>
                            <p>Màu sắc: đỏ</p>
                        </div>
                        <div style="text-align: right;">
                            <p>X1</p>
                            <p>XX.000.000</p>
                        </div>
                    </div>
                </div>

                <div class="order-item">
                    <div class="order-details">
                        <img src="img/product-4.jpg" alt="Product Image">
                        <div style="width: 80%;">
                            <h5>Tên sản phẩm nhạc cụ</h5>
                            <p>Phân loại hàng: XXXXX</p>
                            <p>Màu sắc: đỏ</p>
                        </div>
                        <div style="text-align: right;">
                            <p>X1</p>
                            <p>XX.000.000</p>
                        </div>
                    </div>
                </div>

                <div class="order-item">
                    <div class="order-details">
                        <img src="img/product-5.jpg" alt="Product Image">
                        <div style="width: 80%;">
                            <h5>Tên sản phẩm nhạc cụ</h5>
                            <p>Phân loại hàng: XXXXX</p>
                            <p>Màu sắc: đỏ</p>
                        </div>
                        <div style="text-align: right;">
                            <p>X1</p>
                            <p>XX.000.000</p>
                        </div>
                    </div>
                </div>
                <hr>
                <div style="text-align: right;">
                    <h5>Thành tiền: XX.000.000</h5>
                </div>

                <div class="order-actions">
                    <button class="btn btn-secondary">Button back</button>
                    <button class="btn btn-danger">Cancel order</button>
                </div>
                <br>
            </div>
        </div>
    </div>
</body>

</html>
