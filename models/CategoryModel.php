<?php
class CategoryModel extends Db
{
    //lấy danh sách danh mục
    public function getCategories()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `categories`');
        return parent::select($sql);
    }

    //lấy danh mục theo id
    public function getCategoryByID($id)
    {
        $sql = parent::$conection->prepare('SELECT * FROM categories WHERE id = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    //xóa danh mục
    public function deleteCategory($data)
    {
        if (empty($data['id'])) {
            return false;
        }
        $id = $data['id'];
        $sql = parent::$conection->prepare('DELETE FROM `categories` WHERE `id` = ?');
        $sql->bind_param('i', $id);
        $sql->execute();

        $sql1 = parent::$conection->prepare('DELETE FROM `categories_products` WHERE `categories_id` = ?');
        $sql1->bind_param('i', $id);
        $sql1->execute();
        return true;
    }

    //sửa danh mục
    public function updateCategory($data)
    {
        if (empty($data['id']) && empty($data['name'])) {
            return false;
        }
        $id = $data['id'];
        $name = $data['name'];
        $sql = parent::$conection->prepare('UPDATE `categories` SET `name`=? WHERE `id`=?');
        $sql->bind_param('si', $name, $id);
        return $sql->execute();
    }

    //thêm danh mục
    public function createCategory($data)
    {
        if (empty($data['name'])) {
            return false;
        }
        $name = $data['name'];
        $sql = parent::$conection->prepare('INSERT INTO `categories`(`name`) VALUES (?)');
        $sql->bind_param('s', $name);
        return $sql->execute();
    }

    //xóa danh mục của sản phẩm
    public function deleteCategoryProduct($id)
    {
        $sql1 = parent::$conection->prepare('DELETE FROM `categories_products` WHERE `product_id` = ?');
        $sql1->bind_param('i', $id);
        $sql1->execute();
        return true;
    }

    //thêm danh mục sản phẩm
    public function createCategoryProduct($id_product, $id_category)
    {
        $sql = parent::$conection->prepare('INSERT INTO `categories_products`(`categories_id`, `product_id`) VALUES (?,?)');
        $sql->bind_param('ii', $id_category, $id_product);
        return $sql->execute();
    }
}
