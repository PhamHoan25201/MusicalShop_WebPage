<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>
<div class="products index content">
    <!-- Shop Start -->
    <?php $this->assign('title', $product->name); ?>
    <div class="container-body">
        <!-- Shop Detail Start -->
        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <div id="product-carousel">
                        <div class="carousel-inner bg-light">
                            <div class="carousel-item active">
                                <img class="w-100 h-100" src="<?= $product->image_products[0]['path_image'] ?>" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30">
                        <p class="mb-30"><?= $product->description ?></p>
                        <div class="d-flex mb-30">
                            <form>
                                <?php foreach ($product->properties as $key=>$property): ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="property-<?= $property->id ?>" name="property" value="<?= $property->id ?>">
                                    <label class="custom-control-label" for="property-<?= $property->id ?>"><?= $property->name ?></label>
                                </div>
                                <?php endforeach; ?>
                            </form>
                        </div>
                        <h3 class="font-weight-semi-bold mb-30"><?= $product->price ?> VNĐ</h3>
                        <div class="d-flex align-items-center mb-4 pt-2">
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
                            <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add To Cart</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-pane-3">
                                <div class="row">
                                    <div class="col-md-12 mb-30">
                                        <h4 class="mb-4">Leave a review</h4>
                                        <div class="d-flex my-3">
                                            <p class="mb-0 mr-2">Your Rating * :</p>
                                            <div class="text-primary">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <form>
                                            <div class="form-group">
                                                <label for="message">Your Review *</label>
                                                <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group mb-0">
                                                <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="review media mb-4">
                                            <img src="/img/Products/User1.png" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6>YchiTQ<small> - <i>01/08/2024</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="far fa-star"></i>
                                                </div>
                                                <p>Là một giảng viên âm nhạc, tôi đánh giá đây là một sản phẩm chất lượng với giá cả phải chăng, phù hợp cho những bạn muốn làm quen với piano.</p>
                                            </div>
                                        </div>
                                        <div class="review media mb-4">
                                            <img src="/img/Products/User2.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                                <h6>DongLT<small> - <i>03/08/2024</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>Với tư cách là một nhà đầu tư hướng nội với kinh nghiệm trên nhiều lĩnh vực, tôi cho rằng đây là một sản phẩm rất đáng để đầu tư.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Detail End -->
    </div>
    <!-- Shop End -->
</div>
