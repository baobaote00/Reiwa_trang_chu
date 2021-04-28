<?php
class DoiTacModel extends Db
{
	//xóa tất cả đối tác
	public function deleteAllDoiTac()
	{
		$sql = parent::$conection->prepare('DELETE FROM `doitac` ');
		return $sql->execute();
	}

	//lấy danh sách đối tác
	public function getDoiTac()
	{
		$sql = parent::$conection->prepare('SELECT * FROM `doitac`');
		return parent::select($sql);
	}

	//thêm đối tác
	public function insertDoiTac($data)
	{
		if (empty($data['name'])  && empty($data['img'])) {
			return false;
		}
		$sql = parent::$conection->prepare('INSERT INTO `doitac`( `name`, `image`) VALUES (?,?)');
		$sql->bind_param('ss', $name, $img);
		$sql->execute();
	}
}
