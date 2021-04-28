<?php
class BannerModel extends Db
{
    //lấy danh sách banner
    public function getBanner()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `banner`');
        return parent::select($sql);
    }

    //thêm banner
    public function createBanner($data)
    {
        if (empty($data['title']) && empty($data['image'])) {
            return false;
        }
        $image = $data['image'];
        $title = $data['title'];
        $sql = parent::$conection->prepare('INSERT INTO `banner`( `image`, `title`) VALUES (?,?)');
        $sql->bind_param('ss', $image, $title);
        return $sql->execute();
    }

    //sửa banner
    public function updateBanner($data)
    {
        if (empty($data['title']) && empty($data['image']) && empty($data['id'])) {
            return false;
        }
        $image = $data['image'];
        $title = $data['title'];
        $id = $data['id'];
        $sql = parent::$conection->prepare('UPDATE `banner` SET `title`=?,`image`=? WHERE `id`=?');
        $sql->bind_param('ssi', $title, $image, $id);
        return $sql->execute();
    }

    //xóa Banner
    public function deleteBanner($data)
    {
        if (empty($data['id'])) {
            return false;
        }
        $id = $data['id'];
        $sql = parent::$conection->prepare('DELETE FROM `banner` WHERE `id` = ?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
}
