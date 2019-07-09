<?php
/**
 * ClassDescription
 * @author qap <qiuapeng921@163.com>
 * @link http://127.0.0.1:8000/index
 * @Date 19-6-18 上午10:35
 */

namespace app\Model;

use ESD\Go\GoModel;

class User extends GoModel
{
    /**
     * 获取数据库表名
     * @return string
     */
    public static function getTableName(): string
    {
        return "users";
    }

    /**
     * 获取主键名
     * @return string
     */
    public static function getPrimaryKey(): string
    {
        return "user_id";
    }
}
