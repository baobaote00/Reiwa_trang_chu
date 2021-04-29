<?php
$listContent1 =  setContent1();
?>
<!-- content1 -->
<div class="slideshow-container">

    <?php
    foreach ($listContent1 as $value) {
    ?>
        <div class="mySlides">
            <img src="<?php echo $value['image'] ?>" style="width:100%; height:400px;">
            <div style="z-index: 10; position: absolute; width: 100%; text-align: center; top: 40%; color: red;">
                <span class="sider-text-color"><?php echo $value['title'] ?></span>
            </div>
        </div>

    <?php
    }
    ?>
    <br>

    <div style="text-align:center">
        <?php
        for ($i = 1; $i <= count($listContent1); $i++) {
        ?>
            <span class="dot" onclick="currentSlide(<?php echo $i ?>)"></span>
        <?php
        }
        ?>
    </div>

</div>