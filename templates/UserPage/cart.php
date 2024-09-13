<?php
//----------------------------------------------------------------------------
//
//  Project name : Musical Shop (WebPage)
//  Class Name   :
//  Overview     : Template màn hình hiển thị cart
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
    <title>Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <!-- Favicon -->
    <link href="./favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="./lib/Common/animate/animate.min.css" rel="stylesheet">
    <link href="./lib/Common/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- Customi./zed Bootstrap Stylesheet -->
    <link href="./css/Common/style.css" rel="stylesheet">
    <link href="./css/Cart/cart.css" rel="stylesheet">

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="./lib/Common/easing/easing.min.js"></script>
    <script src="./lib/Common/owlcarousel/owl.carousel.min.js"></script>
    <!-- Contact Javascript File -->
    <script src="./mail/Common/jqBootstrapValidation.min.js"></script>
    <script src="./mail/Common/contact.js"></script>
    <!-- Template Javascript -->
    <script src="./js/Common/main.js"></script>
</head>

<body>
    <!-- Tiêu đề Begin -->
    <h2 class="section-title text-uppercase" style="text-align: center; margin-top: 40px;">
        <span class="bg-secondary pr-3">Giỏ hàng của tôi</span>
    </h2>
    <!-- Tiêu đề End -->
    <br>

    <!-- Flow order Begin -->
    <div class="progress-container">
        <div class="step">
            <div class="icon">🛒</div>
            <div class="label">Giỏ hàng của tôi</div>
            <div class="number">1</div>
        </div>
        <div class="step">
            <div class="icon">💲</div>
            <div class="label">Thanh toán</div>
            <div class="number">2</div>
        </div>
        <div class="step">
            <div class="icon">✅</div>
            <div class="label">Hoàn tất</div>
            <div class="number">3</div>
        </div>
        <div class="line"></div>
    </div>
    <!-- Flow order End -->

    <!-- Cart Start -->
    <div class="container-fluid" style="margin-top: 70px;">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"><img src="./img/product-1.jpg" alt="" style="width: 50px;"> Product
                                Name</td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i>
                                </button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="./img/product-2.jpg" alt="" style="width: 50px;"> Product
                                Name</td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="./img/product-3.jpg" alt="" style="width: 50px;"> Product
                                Name</td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="./img/product-4.jpg" alt="" style="width: 50px;"> Product
                                Name</td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button></td>
                        </tr>
                        <tr>
                            <td class="align-middle"><img src="./img/product-5.jpg" alt="" style="width: 50px;"> Product
                                Name</td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle">150.000.000 vnđ</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-end">
            <div class="px-xl-5">
                <div class="bg-light p-30 mb-5">
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Tổng thanh toán:</h5>
                            <h5>150.000.000 vnđ</h5>
                        </div>
                        <div class="button-container">
                            <button class="btn btn-primary font-weight-bold my-3 py-3">Tiếp tục order</button>
                            <button class="btn btn-primary font-weight-bold my-3 py-3">Tiến hành thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Cart End -->

    <!-- Back to Top Begin-->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- Back to Top End-->
</body>

</html>