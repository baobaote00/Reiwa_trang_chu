<?php
class EmbedModel extends Db
{
    //lấy mã nhúng
	public function getEmbed()
	{
		$sql = parent::$conection->prepare('SELECT * FROM `embed_code`');
		return parent::select($sql);
	}
}