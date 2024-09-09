<?php
//----------------------------------------------------------------------------
//
//  Project name : Musical Shop (WebPage)
//  Class Name   :
//  Overview     : Template màn hình hiển thị danh sách sản phẩm theo category
//  Programmer   : TaiTD@SSV
//  Created Date : 2024/09/08
//  Version      :  0.0.0.1
//
//----------< History >--------------------------------------------------------
//  ID           : 
//  Programmer   :
//  Updated Date :
//  Comment      :
//  Version      :  
//-----------------------------------------------------------------------------

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<div class="products index content">
    <!-- Shop Start -->
    <?php $this->assign('title', $category->name); ?>
    <div class="container-body">
        <div class="row px-xl-5">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-8">
                <div class="row pb-3">
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-3 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="position-relative overflow-hidden">
                                    <img class="img-fluid w-100" src="<?= $product->image_products[0]['path_image'] ?>" alt="">
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-truncate" href="../detail/<?= $product->id ?>"><?= $product->name ?></a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5><?= $product->price ?> VNĐ</h5>
                                    </div>
                                    <a href="javascript:" class="btn btn-primary" onclick="displayModal(this)">Add</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Shop Product End -->
             
            <!-- Modal Start -->
            <div id="modal" class="modal-add">
                <div class="row px-xl-5">
                    <button class="close-button btn" onclick="closeModal()"><i class="fa fa-times"></i></button>
                    <div class="col-lg-5">
                        <div id="product-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner bg-light">
                                <div class="carousel-item active">
                                    <img id="modalProductImage" class="w-100 h-100" src="../img/Products/product-1.jpg" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 h-auto">
                        <div class="h-100 bg-light pt-5 pl-5">
                            <h3  id="modalProductName" class="d-flex mb-30">Product Name</h3>
                            <div class="d-flex mb-30">
                                <strong class="text-dark mr-3">Sizes:</strong>
                                <form>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-2" name="size">
                                        <label class="custom-control-label" for="size-2">S</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-3" name="size">
                                        <label class="custom-control-label" for="size-3">M</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-4" name="size">
                                        <label class="custom-control-label" for="size-4">L</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="size-5" name="size">
                                        <label class="custom-control-label" for="size-5">XL</label>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex mb-30">
                                <strong class="text-dark mr-3">Colors:</strong>
                                <form>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="color-1" name="color">
                                        <label class="custom-control-label" for="color-1">Black</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="color-2" name="color">
                                        <label class="custom-control-label" for="color-2">White</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" class="custom-control-input" id="color-3" name="color">
                                        <label class="custom-control-label" for="color-3">Red</label>
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex align-items-center pt-2">
                                <div class="input-group quantity mr-3" style="width: 130px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="btn btn-primary px-3" onclick="cartAdd()"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal End -->
        </div>
    </div>
    <!-- Shop End -->
</div>
