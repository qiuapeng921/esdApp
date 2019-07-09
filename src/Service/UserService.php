<?php
/**
 * ClassDescription
 * @author qap <qiuapeng921@163.com>
 * @link http://127.0.0.1:8000/index
 * @Date 19-6-18 上午10:35
 */

namespace app\Service;

use app\Model\User;
use ESD\Plugins\Mysql\MysqlException;
use ESD\Plugins\Validate\ValidationException;
use ESD\Psr\Tracing\TracingInterface;

class UserService implements TracingInterface
{
    /**
     * getUser
     * @param $id
     *
     * @return User|null
     *
     * @throws MysqlException
     * @throws ValidationException
     */
    public function getUser($id)
    {
        $result = User::select($id);
        return $result;
    }
}
