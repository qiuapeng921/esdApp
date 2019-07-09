<?php

namespace app\Socket;

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
 * @package app\Socket
 */
class Base extends GoController
{
    use GetSession;
    use GetRedis;
    use GetHttp;
    use GetMysql;
    use GetCache;
}
