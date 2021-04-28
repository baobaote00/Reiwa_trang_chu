<?php
require_once 'config/database.php';
require_once 'config/url.php';
spl_autoload_register(function ($class_name) {
    require 'models/' . $class_name . '.php';
});


if (isset($_GET['take'])) {

    echo getImgByCategoryId($_GET['take']);
}

function getImgByCategoryId($id)
{
    $sanPhamModel = new ProductModel();
    $sanphamList = $sanPhamModel->get_DauAnCongTrinh_By_CategoryID($id);
    $css = "";
    $str = "";
    $i = 0;
    foreach ($sanphamList as $key => $item) {
        if ($i != 0) {
            $i = 1;
            $css = "repo-product";
        }

        $str .=    '<div class="col-md-3 col-xs-6 "><a href="' .  URL_PAGE_DAU_AN_CONG_TRINH .  '&id=' . $item['id'] . '">
        <img src="' .  $item['photo'] . '" alt="" style="padding-top: 25px; height: 250px; width: 100%;">
    </a>
</div>';
    }
    return $str;
}


?>