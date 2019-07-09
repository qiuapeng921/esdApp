<?php
/**
 * ClassDescription
 * @author qap <qiuapeng921@163.com>
 * @link http://127.0.0.1:8000/index
 * @Date 19-6-18 下午5:26
 */

namespace app\Tcp;


use ESD\Go\GoController;
use ESD\Plugins\AnnotationsScan\Annotation\Component;
use ESD\Plugins\Cache\GetCache;
use ESD\Plugins\EasyRoute\GetHttp;
use ESD\Plugins\Mysql\GetMysql;
use ESD\Plugins\Redis\GetRedis;
use ESD\Plugins\Session\GetSession;

/**
 * @Component()
 * Class Base
 * @package app\Tcp
 */
class Base extends GoController
{
    use GetSession;
    use GetRedis;
    use GetHttp;
    use GetMysql;
    use GetCache;
}

