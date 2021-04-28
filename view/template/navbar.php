<?php
$list = setNavBar();
$categories = $list['categories'];
$navbar = explode(',',$list['navbar']['content']) ;

function isActive($value = null)
{
    if (empty($_GET['type'])) {
        return 'is-active';
    }
    else if($_GET['type'] == $value){
        return 'is-active';
    }
    return '';
}
function setCategoriesNavBar($categories,$url)
{
    $productModel = new ProductModel();
    $result = '<ul class="dropdown">';
    $i = 0;
    foreach ($categories as $value) {
        $countProduct = $productModel->getCountCategoriesProduct($value['id'],$url);
        if ($countProduct == 0) {
            continue;
        }
        if ($i == 10) {
            break;
        }
        $result .=  '<li><a href=" ' . $url . '&id=' . $value['id'] . '" class="nav-text-style-1">' . $value['name'] . '</a></li>';
    $i++;
    }
    $result .= '</ul>';
    return $result;
}

$navBarList = [
    0 => '<li class="nav-item "><a href="' . URL_TRANG_CHU . '" class="nav-text-style nav-padding ' . isActive() . '">Trang Chủ</a></li>',
    1 => '<li class="nav-item "><a href="' . URL_GIOI_THIEU . '" class="nav-text-style nav-padding ' . isActive('gioi_thieu') . '">Giới thiệu</a></li>',
    2 => '<li class="nav-item "><a href="' . URL_DAU_AN_CONG_TRINH . '" class="nav-text-style nav-padding ' . isActive('dau_an') . '">Dấu ấn công trình</a>'.setCategoriesNavBar($categories,URL_DAU_AN_CONG_TRINH).'</li>',
    3 => '<li class="nav-item "><a href="' . URL_MAU_THIET_KE . '" class="nav-text-style nav-padding ' . isActive('thiet_ke') . '">Mẫu thiết kế</a>'.setCategoriesNavBar($categories,URL_MAU_THIET_KE).'</li>',
    4 => '<li class="nav-item "><a href="' . URL_DU_AN . '" class="nav-text-style nav-padding ' . isActive('du_an') . '">Dự án</a></li>',
    5 => '<li class="nav-item "><a href="' . URL_TIN_TUC . '" class="nav-text-style nav-padding ' . isActive('tin_tuc') . '">Tin tức</a></li>',
    6 => '<li class="nav-item "><a href="' . URL_LIEN_HE . '" class="nav-text-style nav-padding ' . isActive('lien_he') . '">Liên hệ</a></li>',
    7 => '<li class="nav-item "><a href="' . URL_XUONG_SAN_XUAT . '" class="nav-text-style nav-padding ' . isActive('xuong_san_xuat') . '">Xưởng sản xuất</a></li>',
];

foreach ($navbar as $item) {
    echo $navBarList[$item];
}
