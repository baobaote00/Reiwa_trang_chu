<?php
class CustomerModel extends Db
{
    //lấy danh sách thông tin khách hàng
    public function getKhachHang()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `information_customer`');
        return parent::select($sql);
    }

    //thêm thông tin khách hàng
    public function insertKhachHang($data)
    {
        $name = $data['name'];
        $phone = $data['phone'];
        $email = $data['email'];
        $description = $data['content'];
        $sql = parent::$conection->prepare('INSERT INTO `information_customer`( `name`, `phone`,`email`,`description`) VALUES (?,?,?,?)');
        $sql->bind_param('ssss', $name, $phone, $email, $description);
        $sql->execute();
    }
}
