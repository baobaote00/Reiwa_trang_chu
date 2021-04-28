<?php
class ThemeModel extends Db
{
    public static function getTheme($position)
    {
        $sql = parent::$conection->prepare('SELECT * FROM `custom_theme` WHERE position=?');
        $sql->bind_param('s',$position);
        return parent::select($sql)[0];
    }
}