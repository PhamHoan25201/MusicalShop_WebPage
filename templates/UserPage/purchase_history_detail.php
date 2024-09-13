<?php
//----------------------------------------------------------------------------
//
//  Project name : Musical Shop (WebPage)
//  Class Name   :
//  Overview     : Template màn hình hiển thị chi tiết lịch sử mua hàng
//  Programmer   : ThanhND@SSV
//  Created Date : 2024/09/13
//  Version      : 0.1
//
//----------< History >--------------------------------------------------------
//  ID           : 
//  Programmer   :
//  Updated Date :
//  Comment      :
//  Version      :  
//-----------------------------------------------------------------------------

    $this->disableAutoLayout();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Purchase history detail</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/History/purchase_history_detail.css" rel="stylesheet">

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row px-xl-5" style="display: block;">
            <br>
            <h2 class="order-header">Chi tiết lịch sử mua hàng</h2>

            <div class="order-info">
                <div>
                    <h5><i class="fas fa-truck"></i> Trạng thái đơn hàng</h5>
                    <span class="mg-left">Hoàn thành giao hàng</span>
                </div>
                <br>
                <div>
                    <h5><i class="fas fa-map-marker-alt"></i> Địa chỉ giao hàng</h5>
                    <span class="mg-left">Tên người nhận: Nguyễn Duy Thanh</span><br>
                    <span class="mg-left">SDT: 0843456567</span><br>
                    <span class="mg-left">Địa chỉ giao hàng: 28 Nguyễn Tri Phương, Phú Hội, Huế</span>
                </div>
                <br>
                <div>
                    <h5><i class="fas fa-credit-card"></i> Phương thức thanh toán</h5>
                    <span class="mg-left">Giao hàng tại nhà</span>
                </div>
                <br>

                <div>
                    <h5><i class="fas fa-check"></i> Thông tin sản phẩm</h5>
                    <div class="order-details mg-left">
                        <p>Mã số order
                            <br>XXXXXXXXXX
                        </p>
                        <p style="width: 68%;">Ngày đặt hàng
                            <br>XXXXXXXXXX
                        </p>
                        <p>Trạng thái đơn hàng: Đã hoàn thành</p>
                    </div>
                </div>
                <div class="order-item mg-left">
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

                <div class="order-item mg-left">
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

                <div class="order-item mg-left">
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