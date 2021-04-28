<header class="title col-xs-12" style="margin-top: 50px;">
    <div class="title_right">
        <div class="title_center">
            <h3><span style="font-weight: bold;">Bài viết liên quan</span></h3>
        </div>
    </div>
</header>


<div class="des col-xs-12 text-justify" style="margin-top: 10px; ">
    <?php
    $i = 0;
    foreach (setBar() as $value) {
        if ($i == 4) {
            break;
        }
    ?>
        <div class="a" style="margin-bottom: 5px;">
            <a href=""><?php echo $value['name'] ?></a>
        </div>
    <?php
        $i++;
    }
    ?>
</div>