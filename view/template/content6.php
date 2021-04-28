<?php
$content6 = setContent6();
$productContent6 = $content6[0];
$postContent6 = $content6[1];
?>
<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
    <div class="row">
        <div class="col-md-6">
            <h1 style="margin-bottom: 20px;">THÔNG TIN HỮU ÍCH</h1>
            <a href="<?php echo URL_PAGE_DU_AN . '&id=' . $postContent6[0]['id'] ?>">
                <img src="
                <?php if (empty($postContent6[0]['photo'])) {
                    echo DEFAULT_IMG;
                } else {
                    echo $postContent6[0]['photo'];
                } ?>" alt="" style="width: 100%; height: 315px;margin-bottom: 15px;">

                <h5>
                    <?php echo $postContent6[0]['name'] ?> </h5>
            </a>
            <span style="margin-top: 15px;">
                <?php
                $str = strip_tags($postContent6[0]['description']);
                if (strlen($str) > 333) {
                    $str = substr($str, 0, 333) . '...';
                }
                echo $str; ?> </span><br>
            <div style="margin-bottom: 30px;">
                <span style="margin-right: 15px;"><i class="far fa-clock"></i>
                    <?php echo $postContent6[0]['date'] ?> </span>
            </div>


            <div>
                <?php
                for ($i = 1; $i <= 2; $i++) {
                ?>
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <img src="<?php if (empty($postContent6[$i]['photo'])) {
                                            echo DEFAULT_IMG;
                                        } else {
                                            echo $postContent6[$i]['photo'];
                                        } ?>" alt="" style="width: 100%; height: 215px;">
                        </div>
                        <div class="col-sm-8" style="margin-bottom: 20px;">
                            <a href="<?php echo URL_PAGE_DU_AN . '&id=' . $postContent6[$i]['id'] ?>">
                                <h5>
                                    <?php echo $postContent6[$i]['name'] ?>
                                </h5>
                            </a>
                            <span style="margin-top: 15px;">
                                <?php
                                $str = strip_tags($postContent6[$i]['description']);
                                if (strlen($str) > 333) {
                                    $str = substr($str, 0, 333) . '...';
                                }
                                echo $str; ?>
                            </span><br>
                            <div style="bottom: 0px; margin-top: 15px;">
                                <span style="margin-right: 15px;"><i class="far fa-clock"></i>
                                    <?php echo $postContent6[$i]['date'] ?> </span>
                                <br>
                            </div>

                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>


        <div class="col-md-6">
            <h1 style="margin-bottom: 20px;">GIẢI PHÁP THIẾT KẾ</h1>
            <div class="row" style="margin-bottom: 50px;">
                <div class="col-md-6">
                    <img src="
                    <?php if (empty($productContent6[0]['photo'])) {
                        echo DEFAULT_IMG;
                    } else {
                        echo $productContent6[0]['photo'];
                    } ?>" alt="" style="width: 100%; height: 315px;">
                </div>
                <div class="col-sm-6" style="margin-bottom: 20px;">
                    <a href="<?php echo URL_PAGE_MAU_THIET_KE . '&id=' . $productContent6[0]['id'] ?>">
                        <h5>
                            <?php echo $productContent6[0]['name'] ?> </h5>
                    </a>
                    <span>
                        <?php
                        $str = strip_tags($productContent6[0]['description']);
                        if (strlen($str) > 333) {
                            $str = substr($str, 0, 333) . '...';
                        }
                        echo $str; ?></span><br>
                </div>
            </div>


            <div style="margin-top: 15px;">
                <div class="row" style="margin-top: 15px;">
                    <?php
                    for ($i = 1; $i <= 4; $i++) {
                    ?>
                        <div class="col-md-6" style="margin-bottom: 20px;">
                            <img src="<?php if (empty($productContent6[$i]['photo'])) {
                                            echo DEFAULT_IMG;
                                        } else {
                                            echo $productContent6[$i]['photo'];
                                        } ?>" alt="" style="width: 100%; height: 215px;">
                            <a href="<?php echo URL_PAGE_MAU_THIET_KE . '&id=' . $productContent6[$i]['id'] ?>">
                                <?php
                                $str = strip_tags($productContent6[$i]['description']);
                                if (strlen($str) > 333) {
                                    $str = substr($str, 0, 333) . '...';
                                }
                                echo $str; ?>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>