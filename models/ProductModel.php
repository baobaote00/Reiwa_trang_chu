<?php
class ProductModel extends Db
{
    //đếm số sản phẩm của danh mục
    public function getCountCategoriesProduct($id_categories,$url)
    {
        $arrUrl = [
            URL_DAU_AN_CONG_TRINH => 7,
            URL_MAU_THIET_KE => 6,
        ];
        $id_classify = $arrUrl[$url];
        $sql = parent::$conection->prepare('SELECT COUNT(`product_id`) FROM `categories_products` JOIN `product` ON `product_id` = product.id JOIN categories on categories.id = categories_id WHERE categories_id = ? AND product.id_classify = ?');
        $sql->bind_param('ii', $id_categories,$id_classify);
        return parent::select($sql)[0]['COUNT(`product_id`)'];
    }
    //lấy thông tin product mới
    public function getProductNew()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `product` WHERE `status` = 1 ORDER BY`date` DESC');
        return parent::select($sql);
    }
    
    //lấy danh sách dấu ấn công trình theo danh mục
    public function get_DauAnCongTrinh_By_CategoryID($id)
    {
        $sql = parent::$conection->prepare('SELECT * FROM `categories_products` JOIN product ON product.id = product_id WHERE product.id_classify = 7 AND categories_id = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    //lấy danh sách mẫu thiết kế theo danh mục
    public function get_MauThietKe_By_CategoryID_TheoTrang($id, $page, $perPage){
        $start = ($page - 1) * $perPage;
        $sql = parent::$conection->prepare('SELECT * FROM `categories_products` JOIN product ON product.id = product_id WHERE product.id_classify = 6 AND categories_id = ? LIMIT ?,?');
        $sql->bind_param('iii', $id, $start, $perPage);
        return parent::select($sql);
    }

    //lấy số lượng dấu ấn công trình theo danh mục
    public function get_Count_MauThietKe_By_CategoryID_TheoTrang($id)
    {
        $sql = parent::$conection->prepare('SELECT COUNT(id) FROM `categories_products` JOIN product ON product.id = product_id WHERE product.id_classify = 6 AND categories_id = ?');
        $sql->bind_param('i',$id);
        return parent::select($sql)[0]['COUNT(id)'];
    }

    //lấy danh sách dấu ấn công trình theo danh mục
    public function get_DauAnCongTrinh_By_CategoryID_TheoTrang($id, $page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$conection->prepare('SELECT * FROM `categories_products` JOIN product ON product.id = product_id WHERE product.id_classify = 7 AND categories_id = ? LIMIT ?,?');
        $sql->bind_param('iii', $id, $start, $perPage);
        return parent::select($sql);
    }

    //lấy số lượng dấu ấn công trình theo danh mục
    public function get_Count_DauAnCongTrinh_By_CategoryID_TheoTrang($id)
    {
        $sql = parent::$conection->prepare('SELECT COUNT(id) FROM `categories_products` JOIN product ON product.id = product_id WHERE product.id_classify = 7 AND categories_id = ?');
        $sql->bind_param('i',$id);
        return parent::select($sql)[0]['COUNT(id)'];
    }

    //lấy thông tin product
    public function getProduct($id)
    {
        $sql = parent::$conection->prepare('SELECT * FROM `product` WHERE `id` = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    //lấy tất cả mẫu thiết kế (admin)
    public function get_MauThietKe()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `product` WHERE `id_classify` = 6 ORDER BY`date`');
        return parent::select($sql);
    }

    //lấy tất cả dấu ấn công trình (admin)
    public function get_DauAnCongTrinh()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `product` WHERE `id_classify` = 7');
        return parent::select($sql);
    }

    //lấy mẫu thiết kế mới nhất theo trang (trang chủ)
    public function get_MauThietKe_TheoTrang($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$conection->prepare('SELECT * FROM `product` WHERE `id_classify` = 6 AND `status` = 1 ORDER BY`date` DESC LIMIT ?,?');
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    //lấy tổng mẫu thiết kế mới
    public function get_Count_MauThietKe()
    {
        $sql = parent::$conection->prepare('SELECT COUNT(id) FROM `product` WHERE id_classify = 6 AND `status` = 1');
        return parent::select($sql)[0]['COUNT(id)'];
    }

    //lấy dấu ấn công trình mới nhất theo trang (trang chủ)
    public function get_DauAnCongTrinh_TheoTrang($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$conection->prepare('SELECT * FROM `product` WHERE `id_classify` = 7 AND `status` = 1 ORDER BY`date` DESC LIMIT ?,?');
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    //lấy tổng dấu ấn công trình mới
    public function get_Count_DauAn()
    {
        $sql = parent::$conection->prepare('SELECT COUNT(id) FROM `product` WHERE id_classify = 7 AND `status` = 1');
        return parent::select($sql)[0]['COUNT(id)'];
    }

    //Xóa product
    public function deleteProduct($data)
    {
        if (empty($data['id'])) {
            return false;
        }
        $id = $data['id'];
        $sql = parent::$conection->prepare('DELETE FROM `product` WHERE id = ?');
        $sql->bind_param('i', $id);
        $categoryModel = new CategoryModel();
        $categoryModel->deleteCategoryProduct($id);
        return $sql->execute();
    }

    //Thêm product
    public function createProduct($data)
    {
        if (empty($data['id_classify']) && empty($data['name']) && empty($data['description']) && empty($data['category']) && empty($data['status'])) {
            return false;
        }
        if (empty($data['final_time']) && empty($data['address'])) {
            $final_time = null;
            $address = null;
        } else {
            $final_time = $data['final_time'];
            $address = $data['address'];
        }
        $id_classify = $data['id_classify'];
        $name = $data['name'];
        $description = $data['description'];
        $status = $data['status'];
        $img = TienIch::get_src_img($description);
        $sql = parent::$conection->prepare('INSERT INTO `product`( `name`, `date`, `photo`, `description`, `final_time`, `address`,`status`,`id_classify`) VALUES (?,\'' . date("Y-m-d") . '\',?,?,?,?,?,?)');
        $sql->bind_param('sssssii', $name, $img, $description, $final_time, $address, $status, $id_classify);
        $sql->execute();
        $sql1 = parent::$conection->prepare('SELECT * FROM `product` GROUP BY `id` DESC');
        $sanPhamMoi = parent::select($sql1)[0];
        $id_product = $sanPhamMoi['id'];
        $id_categories = $data['category'];
        $categoryModel = new CategoryModel();
        foreach ($id_categories as $id_category) {
            $categoryModel->createCategoryProduct($id_product, $id_category);
        }
        return true;
    }

    //Sửa product
    public function updateProduct($data)
    {
        if (empty($data['name']) && empty($data['description']) && empty($data['category']) && empty($data['status']) && empty($data['id'])) {
            return false;
        }
        if (empty($data['final_time']) && empty($data['address'])) {
            $final_time = null;
            $address = null;
        } else {
            $final_time = $data['final_time'];
            $address = $data['address'];
        }
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];
        $status = $data['status'];
        $img = TienIch::get_src_img($description);
        $sql = parent::$conection->prepare('UPDATE `product` SET `name`=?,`date`=\'' . date("Y-m-d") . '\',`photo`=?,`description`=?,`final_time`=?,`address`=?,`status`=? WHERE `id`=?');
        $sql->bind_param('sssssii', $name, $img, $description, $final_time, $address, $status, $id);
        $sql->execute();
        $id_categories = $data['category'];
        $categoryModel = new CategoryModel();
        $categoryModel->deleteCategoryProduct($id);
        foreach ($id_categories as $id_category) {
            $categoryModel->createCategoryProduct($id, $id_category);
        }
        return true;
    }

    //đổi trạng thái Product
    public  function changeStatusProduct($data)
    {
        if (empty($data['id']) && empty($data['status'])) {
            return false;
        }
        $id = $data['id'];
        $status = $data['status'];
        $sql = parent::$conection->prepare('UPDATE `product` SET `status`=? WHERE `id`=?');
        $sql->bind_param('ii', $status, $id);
        return  $sql->execute();
    }

    //Cập nhật lượt xem product
    public function updateLuotXem($id, $view)
    {
        $sql = parent::$conection->prepare('UPDATE `product` SET view=? WHERE id = ?');
        $sql->bind_param('ii', $view, $id);
        $sql->execute();
    }

    //tìm kiếm dấu ấn công trình và mẫu thiết kế
    public function searchProduct($search)
    {
        $search = "%$search%";
        $sql = parent::$conection->prepare("SELECT * FROM `product` WHERE `name` LIKE ? OR `description` LIKE ? AND `status` = 1 AND `id_classify`IN(6,7) ORDER BY`date` DESC");
        $sql->bind_param('ss', $search, $search);
        return parent::select($sql);
    }

    //lấy số lượng tin tức và dự án tìm kiếm được
    public function count_searchProduct($search)
    {
        $search = "%$search%";
        $sql = parent::$conection->prepare("SELECT COUNT(id) FROM `product` WHERE `name` LIKE ? OR `description` LIKE ? AND `status` = 1 AND `id_classify`IN(6,7)");
        $sql->bind_param('ss', $search, $search);
        return parent::select($sql)[0]['COUNT(id)'];
    }
}
