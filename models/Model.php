<?php
class Model
{
    //lấy Post và Product mới nhất
    public static function getProductPostNew()
    {
        $postModel = new PostModel();
        $productModel = new ProductModel();

        $listPost = $postModel->getPostNew();
        $listProduct = $productModel->getProductNew();
        $listResult = array_merge($listPost, $listProduct);
        $listResult = TienIch::sort_ngay_dang($listResult);
        $result = [];
        if(count($listResult)>7){
            for ($i=0; $i < 7; $i++) { 
                $result[] = $listResult[$i];
            }
        }
        else{
            $result = $listResult;
        }
        return $result;
    }

    //lấy search theo trang
    public static function searchTheoTrang($search, $page, $perPage, $totalRow)
    {
        $postModel = new PostModel();
        $productModel = new ProductModel();

        $searchPost = $postModel->searchPost($search);
        $searchProduct = $productModel->searchProduct($search);
        $searchResult = array_merge($searchPost, $searchProduct);
        $searchResult = TienIch::sort_ngay_dang($searchResult);
        $searchResult = TienIch::get_array_page($searchResult, $page, $perPage, $totalRow);

        return $searchResult;
    }

    //lấy tổng search
    public static function count_search($search)
    {
        $postModel = new PostModel();
        $productModel = new ProductModel();

        $cout_searchPost = $postModel->count_searchPost($search);
        $cout_searchProduct = $productModel->count_searchProduct($search);
        $cout_searchResult = $cout_searchPost + $cout_searchProduct;

        return $cout_searchResult;
    }

    //kiểm tra đường dẫn quên mật khẩu
    public static function check_link_fogotPassword()
    {
        $name_session = 'user' . $_GET['name'];
        $time_session = 'time' . $_GET['name'];
        $strs = explode('&', $_SERVER['REQUEST_URI']);
        $str = array_pop($strs);
        if (($_SESSION[$time_session] + 300) < time()) {
            unset($_SESSION[$time_session]);
            unset($_SESSION[$name_session]);
        }
        if (empty($_SESSION[$name_session])) {
            return -1;
        } else if ($_SESSION[$name_session] == $str) {
            return 1;
        } else {
            return 0;
        }
    }

    //kiểm tra user đã đang nhập
    public static function check_user_login(){
        if (empty($_COOKIE['username'])) {
            header('Location: /model_reiwa/login.php');
        }
        return true;
    }

    //cập nhật view post
    public static function updatePostView($id,$view){
        if (empty($_SESSION['post'.$id])) {
            $postModel = new PostModel();
            $postModel->updateLuotXemPost($id,$view);
            $_SESSION['post'.$id] = true;
        }
    }

    //cập nhật view product
    public static function updateProductView($id,$view){
        if (empty($_SESSION['product'.$id])) {
            $productModel = new ProductModel();
            $productModel->updateLuotXem($id,$view);
            $_SESSION['product'.$id] = true;
        }
    }
}
