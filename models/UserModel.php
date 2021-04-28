<?php
class UserModel extends Db
{
    //lấy User
    public function getUser($username)
    {
        $sql = parent::$conection->prepare('SELECT * FROM `users` WHERE LOWER(`username`) LIKE LOWER(?)');
        $sql->bind_param('s', $username);
        return parent::select($sql)[0];
    }

    //tạo User
    public function createUser($data)
    {
        if (empty($data['username']) && empty($data['name']) && empty($data['email']) && empty($data['permission']) && empty($data['status'])) {
            return false;
        }
        $username = $data['username'];
        $name = $data['name'];
        $email = $data['email'];
        $permission = $data['permission'];
        $status = $data['status'];
        $password = password_hash($username, PASSWORD_DEFAULT);
        $sql = parent::$conection->prepare('INSERT INTO `users`(`username`, `password`, `name`, `email`, `permission`, `last_ip`, `status`) VALUES (?,?,?,?,?,\'\',?)');
        $sql->bind_param('ssssii', $username, $password, $name, $email, $permission, $status);
        return $sql->execute();
    }

    //đổi quyền và trạng thái User
    public function changePermissionStatusUser($data)
    {
        if (empty($data['username']) && empty($data['permission'])&& empty($data['status'])) {
            return false;
        }
        $username = $data['username'];
        $permission = $data['permission'];
        $status = $data['status'];
        $sql = parent::$conection->prepare('UPDATE `users` SET `permission`= ? , `status`= ? WHERE `username` = ?');
        $sql->bind_param('iis', $permission, $status ,$username);
        return $sql->execute();
    }

    //reset password User
    public function resetPasswordUser($data)
    {
        if (empty($data['username'])) {
            return false;
        }
        $username = $data['username'];
        $password = password_hash($username, PASSWORD_DEFAULT);
        $sql = parent::$conection->prepare('UPDATE `users` SET `password`= ? WHERE `username` = ?');
        $sql->bind_param('ss', $password ,$username);
        return $sql->execute();
    }

    //đổi password User
    public function changePasswordUser($data)
    {
        if (empty($data['username']) && empty($data['new-password'])) {
            return false;
        }
        $username = $data['username'];
        $password = password_hash($data['new-password'], PASSWORD_DEFAULT);
        $sql = parent::$conection->prepare('UPDATE `users` SET `password`= ? WHERE `username` = ?');
        $sql->bind_param('ss', $password ,$username);
        return $sql->execute();
    }

    //xóa User
    public function deleteUser($data)
    {
        if (empty($data['username'])) {
            return false;
        }
        $username = $data['username'];
        $sql = parent::$conection->prepare('DELETE FROM `users` WHERE `username` = ?');
        $sql->bind_param('s', $username);
        return $sql->execute();
    }
}
