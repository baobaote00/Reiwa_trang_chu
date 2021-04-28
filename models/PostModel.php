<?php

class PostModel extends Db
{
    //lấy thông tin post mới
    public function getPostNew()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `product` WHERE `id_classify`IN(6,7) AND `status` = 1 ORDER BY`date` DESC');
        return parent::select($sql);
    }

    //Xóa bài viết
    public  function deletePost($data)
    {
        if (empty($data['id'])) {
            return false;
        }
        $id = $data['id'];
        $sql = parent::$conection->prepare('DELETE FROM `post` WHERE id = ?');
        $sql->bind_param('i', $id);
        return $sql->execute();
    }

    //Thêm bài viết
    public  function createPost($data)
    {
        if (empty($data['name']) && empty($data['description']) && empty($data['author']) && empty($data['id_classify']) && empty($data['status'])) {
            return false;
        }
        $name = $data['name'];
        $description = $data['description'];
        $author = $data['author'];
        $id_classify = $data['id_classify'];
        $status = $data['status'];
        $img = TienIch::get_src_img($description);
        $sql = parent::$conection->prepare('INSERT INTO `post`(`name`, `photo`, `description`, `date`,`id_classify`,`author`,`view_count`,`status`) VALUES (?,?,?,\'' . date("Y-m-d") . '\',?,?,0,?)');
        $sql->bind_param('sssisi', $name, $img, $description, $id_classify, $author, $status);
        return $sql->execute();
    }

    //sửa bài viết
    public  function updatePost($data)
    {
        if (empty($data['name']) && empty($data['description']) && empty($data['author']) && empty($data['status']) && empty($data['id'])) {
            return false;
        }
        $id = $data['id'];
        $name = $data['name'];
        $description = $data['description'];
        $author = $data['author'];
        $status = $data['status'];
        $img = TienIch::get_src_img($description);
        $sql = parent::$conection->prepare('UPDATE `post` SET `name`=?,`photo`=?,`description`=?,`date`=\'' . date("Y-m-d") . '\',`author`=?,`status`=? WHERE `id`=?');
        $sql->bind_param('ssssii', $name, $img, $description, $author, $status, $id);
        return  $sql->execute();
    }

    //đổi trạng thái bài viết
    public  function changeStatusPost($data)
    {
        if (empty($data['id']) && empty($data['status'])) {
            return false;
        }
        $id = $data['id'];
        $status = $data['status'];
        $sql = parent::$conection->prepare('UPDATE `post` SET `status`=? WHERE `id`=?');
        $sql->bind_param('ii', $status, $id);
        return  $sql->execute();
    }

    //lấy thông tin post
    public function getPost($id)
    {
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE id=? AND `status` = 1 ');
        $sql->bind_param('i', $id);
        return parent::select($sql)[0];
    }

    //lấy tất cả post theo classify
    public function getPostClassify($id)
    {
        $sql = parent::$conection->prepare('SELECT * FROM `post` JOIN `classify` ON classify.id = post.id WHERE classify.id = ?');
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }

    //lấy tất cả tin tức mới nhất (admin)
    public function get_TinTuc()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE `id_classify` = 1 ORDER BY`date`');
        return parent::select($sql);
    }

    //lấy tin tức mới nhất theo trang (trang chủ)
    public function get_TinTucTheoTrang($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE `id_classify` = 1 AND `status` = 1 ORDER BY`date` DESC LIMIT ?,?');
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    //lấy tổng tin tức
    public function get_Count_TinTuc()
    {
        $sql = parent::$conection->prepare('SELECT COUNT(id) FROM `post` WHERE id_classify = 1 AND `status` = 1');
        return parent::select($sql)[0]['COUNT(id)'];
    }

    //lấy tất cả dự án mới nhất (admin)
    public function get_DuAn()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE `id_classify` = 2 ORDER BY`date`');
        return parent::select($sql);
    }

    //lấy dự án mới nhất theo trang (trang chủ)
    public function get_DuAnTheoTrang($page, $perPage)
    {
        $start = ($page - 1) * $perPage;
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE `id_classify` = 2 AND `status` = 1 ORDER BY`date` DESC LIMIT ?,?');
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }

    //lấy tổng dự án
    public function get_Count_DuAn()
    {
        $sql = parent::$conection->prepare('SELECT COUNT(id) FROM `post` WHERE id_classify = 2 AND `status` = 1');
        return parent::select($sql)[0]['COUNT(id)'];
    }

    //lấy xưởng sản xuất
    public function get_XuongSanXuat()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE `id_classify` = 4');
        return parent::select($sql)[0];
    }

    //lấy giới thiệu
    public function get_GioiThieu()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE `id_classify` = 3');
        return parent::select($sql)[0];
    }

    //Cập nhật lượt xem post
    public function updateLuotXemPost($id, $view)
    {
        $sql = parent::$conection->prepare('UPDATE `post` SET view_count=? WHERE id = ?');
        $sql->bind_param('ii', $view, $id);
        $sql->execute();
    }

    //Lấy liên hệ
    public function get_LienHe(){
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE `id_classify` = 9');
        return parent::select($sql)[0];
    }

    //tìm kiếm tin tức và dự án
    public function searchPost($search)
    {
        $search = "%$search%";
        $sql = parent::$conection->prepare("SELECT * FROM `post` WHERE `name` LIKE ? OR `description` LIKE ? AND `status` = 1 AND `id_classify`IN(1,2) ORDER BY`date` DESC");
        $sql->bind_param('ss', $search, $search);
        return parent::select($sql);
    }

    //lấy số lượng tin tức và dự án tìm kiếm được
    public function count_searchPost($search)
    {
        $search = "%$search%";
        $sql = parent::$conection->prepare("SELECT COUNT(id) FROM `post` WHERE `name` LIKE ? OR `description` LIKE ? AND `status` = 1 AND `id_classify`IN(1,2)");
        $sql->bind_param('ss', $search, $search);
        return parent::select($sql)[0]['COUNT(id)'];
    }

    //lấy bảo hành
    public function get_BaoHanh()
    {
        $sql = parent::$conection->prepare('SELECT * FROM `post` WHERE `id_classify` = 5');
        return parent::select($sql)[0];
    }
}
