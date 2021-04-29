<?php
$data = setContent4();
$category = $data[1];
$product = $data[0];
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="product-mg-bottom" style="margin:0px; margin-bottom: 15px; margin-top: 15px;">DẤU ẤN CÔNG
                TRÌNH </h1>
        </div>
        <div class="col-md-6">
            <div class="product-mobile" style="margin:0px; margin-top: 15px; text-align: center; margin-bottom: 15px;">
                <?php
                foreach ($category as $value) {
                    $productModel = new ProductModel();
                    $countProduct = $productModel->getCountCategoriesProduct($value['id'], URL_DAU_AN_CONG_TRINH);
                    if ($countProduct == 0) {
                        continue;
                    }
                ?>
                    <a href="javascript:void(0)" onclick="GET_PRODUCE(<?php echo $value['id'] ?>);" style="margin-right: 20px;">
                        <span class="uppercaseText" style="text-transform: uppercase;"> <?php echo $value['name'] ?> </span>
                    </a>
                <?php
                }
                ?>
            </div>
        </div>

    </div>


    <div class="row" id="product-category">



        <a href="chi_tiet_san_pham.php?Lorem-ipsum-dolor-sit-amet-consectetur-adipisicing-elit.-2">
        </a>
        <?php
        $count = (count($product) < 8) ? count($product) : 8;
        for ($i = 0; $i < $count; $i++) {
        ?>
            <div class="col-md-3 col-xs-6 "><a href="<?php echo URL_PAGE_DAU_AN_CONG_TRINH .  '&id=' . $product[$i]['id'] ?>">
                    <img src="
                    <?php if (empty($product[$i]['photo'])) {
                        echo DEFAULT_IMG;
                    } else {
                        echo $product[$i]['photo'];
                    } ?>" alt="" style="padding-top: 25px; height: 250px; width: 100%;">
                </a>
            </div>
        <?php
        }
        ?>


    </div>
    <div class="btn-more-product2"><a href="<?php echo URL_DAU_AN_CONG_TRINH . '&id=' /*. $value['id']*/ ?>" style="padding-left: 20px; padding-right: 20px; padding-bottom: 5px;padding-top: 5px; background: #1a75bc
            ; color: white;">Xem tất cả</a>
    </div>

</div>