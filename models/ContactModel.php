<?php
class ContactModel extends Db
{
    //lấy thông tin liên hệ
    public static function getContact()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `contact`');
        return parent::select($sql);
    }

    //sửa thông tin liên hệ
    public static function updateContact($data)
    {
        if (empty($data['link']) && empty($data['id'])) {
            return false;
        }
        $link = $data['link'];
        $id = $data['id'];
        $sql = parent::$conection->prepare('UPDATE `contact` SET `link`=? WHERE `id`=?');
        $sql->bind_param('si', $link, $id);
        return $sql->execute();
    }
}
