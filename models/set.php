<?php
function setContent1()
{
    $bannerModel = new BannerModel();
    return $bannerModel->getBanner();
}

function  setContent2()
{
    $postModel = new PostModel();
    return $postModel->get_GioiThieu();
}

function  setContent3()
{

}

function  setContent4()
{
    $categoryModel = new CategoryModel();
    $productModel = new ProductModel();
    $productList = $productModel->getProductNew();
    $categoryList =$categoryModel->getCategories();
    $result= [0=>$productList,1=>$categoryList];
    return $result;
}

function  setContent5()
{

}

function  setContent6()
{
    $postModel = new PostModel();
    $postList = $postModel->get_TinTuc();
    $productModel = new ProductModel();
    $productList = $productModel->get_MauThietKe();
    $list = [];
    $list[0] = $productList;
    $list[1] = $postList;
    return $list;
}

function  setContent7()
{
    $nhanVienModel = new NhanSuModel();
    return $nhanVienModel->getNhanSuActive();
}

function  setContent8()
{
    $doiTacModel = new DoiTacModel();
    return $doiTacModel->getDoiTac();
}

function setPost()
{
    $type = $_GET['type'];
    $page = 1;
    $perPage = 12;
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
    $postModel = new PostModel();
    switch ($type) {
        case 'tin_tuc':
            $list = $postModel->get_TinTucTheoTrang($page, $perPage);
            $totalRow = $postModel->get_Count_TinTuc();
            break;
        case 'du_an':
            $list = $postModel->get_DuAnTheoTrang($page, $perPage);
            $totalRow = $postModel->get_Count_DuAn();
            break;
        case 'search':
            $search = $_GET['value'];
            $totalRow = Model::count_search($search);
            $list = Model::searchTheoTrang($search, $page, $perPage, $totalRow);
            break;
    }
    $data = [
        'list' => $list,
        'totalRow' => $totalRow,
        'page' => $page,
        'perPage' => $perPage
    ];
    return $data;
}

function setProduct()
{
    $type = $_GET['type'];
    $page = 1;
    $perPage = 12;
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
    $productModel = new ProductModel();
    $categoryModel = new CategoryModel();
    $category = [];
    switch ($type) {
        case 'dau_an':
            $list = [];
            $category = $categoryModel->getCategories();
            $i = 0;
            foreach ($category as  $value) {
                $productList = $productModel->get_DauAnCongTrinh_By_CategoryID_TheoTrang($value['id'], $page, $perPage);
                $totalRow = $productModel->get_Count_DauAnCongTrinh_By_CategoryID_TheoTrang($value['id']);
                $list[$i++] = [
                    'name' => $value['name'],
                    'id' => $value['id'],
                    'list' => $productList,
                    'totalRow' => $totalRow
                ];
            }
            break;
        case 'thiet_ke':
            $list = [];
            $category = $categoryModel->getCategories();
            $i = 0;
            foreach ($category as  $value) {
                $productList = $productModel->get_MauThietKe_By_CategoryID_TheoTrang($value['id'], $page, $perPage);
                $totalRow = $productModel->get_Count_MauThietKe_By_CategoryID_TheoTrang($value['id']);
                $list[$i++] = [
                    'name' => $value['name'],
                    'id' => $value['id'],
                    'list' => $productList,
                    'totalRow' => $totalRow
                ];
            }
            break;
    }
    $data = [
        'list' => $list,
        'page' => $page,
        'perPage' => $perPage,
    ];
    return $data;
}

function setPage()
{
    $id = 0;
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }
    $type = $_GET['type'];
    switch ($type) {
        case 'xuong_san_xuat':
            $postModel = new PostModel();
            $page = $postModel->get_XuongSanXuat();
            break;
        case 'bao_hanh':
            $postModel = new PostModel();
            $page = $postModel->get_BaoHanh();
            break;
        case 'gioi_thieu':
            $postModel = new PostModel();
            $page = $postModel->get_GioiThieu();
            break;
            case 'lien_he':
                $postModel = new PostModel();
                $page = $postModel->get_LienHe();
                break;
        case 'du_an':
        case 'tin_tuc':
            $postModel = new PostModel();
            $page = $postModel->getPost($id);
            break;
        case 'dau_an':
        case 'thiet_ke':
            $productModel = new ProductModel();
            $page = $productModel->getProduct($id);
            break;
    }
    return $page;
}

function setCategory()
{
    $type = $_GET['type'];
    $page = 1;
    $perPage = 12;
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
    $id = $_GET['id'];
    $productModel = new ProductModel();
    switch ($type) {
        case 'dau_an':
            $list = $productModel->get_DauAnCongTrinh_By_CategoryID_TheoTrang($id, $page, $perPage);
            $totalRow = $productModel->get_Count_DauAnCongTrinh_By_CategoryID_TheoTrang($id);
            break;
        case 'thiet_ke':
            $list = $productModel->get_MauThietKe_By_CategoryID_TheoTrang($id, $page, $perPage);
            $totalRow = $productModel->get_Count_MauThietKe_By_CategoryID_TheoTrang($id);
            break;
    }
    $data = [
        'list' => $list,
        'totalRow' => $totalRow,
        'page' => $page,
        'perPage' => $perPage
    ];
    return $data;
}

function setBar()
{
    $list = Model::getProductPostNew();
    return $list;
}

function setNavBar(){
    $categoryModel = new CategoryModel();
    $themeModel = new ThemeModel();
    $navBar = $themeModel->getTheme('navbar');
    $categories = $categoryModel->getCategories();
    $list = [
        'categories' => $categories,
        'navbar' => $navBar
    ];
return $list;
}


function setHeader(){
    if(empty($_GET['type'])){
        return 'ReiHouse';
    }
    $arrTitlePage = [
        'lien_he' => 'ReiHouse-Liên Hệ',
        'gioi_thieu' => 'ReiHouse-Giới Thiệu',
        'dau_an' => 'ReiHouse-Dấu Ấn Công Trình',
        'thiet_ke' => 'ReiHouse-Mẫu Thiết Kế',
        'du_an' => 'ReiHouse-Dự Án',
        'tin_tuc' => 'ReiHouse-Tin Tức',
        'xuong_san_xuat' => 'ReiHouse-Xưởng Sản Xuất',
        'search' => 'ReiHouse-Tìm Kiếm',
        'bao_hanh' => 'ReiHouse-Bảo Hành',
    ];
    $title = $arrTitlePage[$_GET['type']];

    return $title;
}
