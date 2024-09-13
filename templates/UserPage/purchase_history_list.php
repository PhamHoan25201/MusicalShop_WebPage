<?php
//----------------------------------------------------------------------------
//
//  Project name : Musical Shop (WebPage)
//  Class Name   :
//  Overview     : Template màn hình hiển thị danh sách lịch sử
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
    <title>Purchase History List</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/History/purchase_history_list.css" rel="stylesheet">

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function toggleProducts(productsId, buttonId) {
            const additionalProducts = document.getElementById(productsId);
            const toggleButton = document.getElementById(buttonId);

            if (additionalProducts.style.display === "block") {
                additionalProducts.style.display = "none";
                toggleButton.textContent = "Xem thêm sản phẩm";
            } else {
                additionalProducts.style.display = "block";
                toggleButton.textContent = "Rút gọn sản phẩm";
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="order-history">
            <h2 class="text-center">Danh sách lịch sử đơn hàng</h2>

            <div class="row px-xl-5" style="display: block;">
                <div class="d-flex justify-content-between">
                    <select class="form-control w-25 mb-3">
                        <option>All Order Lists</option>
                        <option>5</option>
                        <option>10</option>
                        <option>15</option>
                        <option>20</option>
                    </select>
                </div>
            </div>

            <div class="row px-xl-5" style="display: block;">
                <div class="order-item">
                    <div class="order-details">
                        <img src="img/product-1.jpg" alt="Product Image">
                        <div style="width: 100%;">
                            <h5>Tên sản phẩm nhạc cụ</h5>
                            <p>Phân loại hàng: XXXXX</p>
                            <p>Số lượng: x1</p>
                        </div>
                        <div style="text-align: right;">
                            <p>XX.000.000</p>
                        </div>
                    </div>

                    <div class="additional-products" id="additional-products-1">
                        <div class="order-details">
                            <img src="img/product-2.jpg" alt="Product Image">
                            <div style="width: 100%;">
                                <h5>Tên sản phẩm nhạc cụ</h5>
                                <p>Phân loại hàng: XXXXX</p>
                                <p>Số lượng: x1</p>
                            </div>
                            <div style="text-align: right;">
                                <p>XX.000.000</p>
                            </div>
                        </div>

                        <div class="order-details">
                            <img src="img/product-3.jpg" alt="Product Image">
                            <div style="width: 100%;">
                                <h5>Tên sản phẩm nhạc cụ</h5>
                                <p>Phân loại hàng: XXXXX</p>
                                <p>Số lượng: x1</p>
                            </div>
                            <div style="text-align: right;">
                                <p>XX.000.000</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-secondary" id="toggleButton-1"
                            onclick="toggleProducts('additional-products-1', 'toggleButton-1')">Xem thêm sản
                            phẩm</button>
                    </div>

                    <div class="order-actions">
                        <h5>Thành tiền: XX.000.000</h5>
                    </div>
                    <br>
                    <div class="order-actions">
                        <button class="btn btn-danger">Cancel order</button>
                        <button class="btn btn-primary">Chi tiết đơn hàng</button>
                    </div>
                </div>

                <div class="order-item">
                    <div class="order-details">
                        <img src="img/product-1.jpg" alt="Product Image">
                        <div style="width: 100%;">
                            <h5>Tên sản phẩm nhạc cụ</h5>
                            <p>Phân loại hàng: XXXXX</p>
                            <p>Số lượng: x1</p>
                        </div>
                        <div style="text-align: right;">
                            <p>XX.000.000</p>
                        </div>
                    </div>

                    <div class="additional-products" id="additional-products-2">
                        <div class="order-details">
                            <img src="img/product-2.jpg" alt="Product Image">
                            <div style="width: 100%;">
                                <h5>Tên sản phẩm nhạc cụ</h5>
                                <p>Phân loại hàng: XXXXX</p>
                                <p>Số lượng: x1</p>
                            </div>
                            <div style="text-align: right;">
                                <p>XX.000.000</p>
                            </div>
                        </div>

                        <div class="order-details">
                            <img src="img/product-3.jpg" alt="Product Image">
                            <div style="width: 100%;">
                                <h5>Tên sản phẩm nhạc cụ</h5>
                                <p>Phân loại hàng: XXXXX</p>
                                <p>Số lượng: x1</p>
                            </div>
                            <div style="text-align: right;">
                                <p>XX.000.000</p>
                            </div>
                        </div>
                    </div>

                    <div>
                        <button class="btn btn-secondary" id="toggleButton-2"
                            onclick="toggleProducts('additional-products-2', 'toggleButton-2')">Xem thêm sản
                            phẩm</button>
                    </div>

                    <div class="order-actions">
                        <h5>Thành tiền: XX.000.000</h5>
                    </div>
                    <br>
                    <div class="order-actions">
                        <button class="btn btn-danger">Cancel order</button>
                        <button class="btn btn-primary">Chi tiết đơn hàng</button>
                    </div>

                </div>
            </div>
        </div>
</body>

</html>