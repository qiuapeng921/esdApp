<?php
/**
 * ClassDescription
 * @author qap <qiuapeng921@163.com>
 * @link http://127.0.0.1:8000/index
 * @Date 19-6-18 下午5:27
 */

namespace app\Tcp;

use ESD\Plugins\EasyRoute\Annotation\GetMapping;
use ESD\Plugins\EasyRoute\Annotation\TcpController;

/**
 * @TcpController()
 * Class Index
 * @package app\Tcp
 */
class Index extends Base
{
    /**
     * index
     * @GetMapping()
     * @return void
     *
     */
    public function index()
    {
        echo 1111111111111;
    }
}
