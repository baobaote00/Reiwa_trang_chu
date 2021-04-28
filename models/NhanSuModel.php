<?php
class NhanSuModel extends Db
{
    //xóa tất cả nhân sự
    public function deleteAllNhanSu(){
        $sql = parent::$conection->prepare('DELETE FROM `nhansu` ');
        return $sql->execute();
    }

    //lấy danh sách nhân sự (admin)
    public function getNhanSu()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `nhansu`');
        return parent::select($sql);
    }

    //lấy danh sách nhân sự (trang chủ)
    public function getNhanSuActive()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `nhansu` WHERE `status` = 1');
        return parent::select($sql);
    }

    //thêm nhân sự
    public function createNhanSu($data)
    {
        if (empty($data['name']) && empty($data['position']) && empty($data['image']) && empty($data['description']) && empty($data['status'])) {
            return false;
        }
        $image = $data['image'];
        $description = $data['description'];
        $status = $data['status'];
        $name = $data['name'];
        $position = $data['position'];
        $sql = parent::$conection->prepare('INSERT INTO `nhansu`( `name`, `position`, `image`, `description`, `status`) VALUES (?,?,?,?,?)');
        $sql->bind_param('ssssi', $name, $position, $image, $description, $status);
        return $sql->execute();
    }
}
