<?php

namespace app\Http;

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
 * @package app\Controller
 */
class Base extends GoController
{
    use GetSession;
    use GetRedis;
    use GetHttp;
    use GetMysql;
    use GetCache;

    public function initialization(?string $controllerName, ?string $methodName)
    {
        $this->response->withHeaders([
            'Access-Control-Allow-Origin'  => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PATCH, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, X-Requested-With'
        ]);
    }
}
