<?php

namespace app;

use DI\DependencyException;
use DI\NotFoundException;
use ESD\Core\Exception;
use ESD\Core\Plugins\Config\ConfigException;
use ESD\Go\GoApplication;
use ESD\Plugins\Ding\DingPlugin;
use ESD\Plugins\EasyRoute\Filter\CorsConfig;
use ESD\Plugins\EasyRoute\Filter\CorsFilter;
use ESD\Plugins\EasyRoute\Filter\FilterManager;
use ReflectionException;
use ESD\Plugins\DBTracing\DBTracingPlugin;
use ESD\Plugins\HttpClientTracing\HttpClientTracingPlugin;
use ESD\Plugins\MethodTracing\MethodTracingPlugin;
use ESD\Plugins\RequestTracing\RequestTracingPlugin;

class Application
{
    /**
     * @throws DependencyException
     * @throws NotFoundException
     * @throws Exception
     * @throws ConfigException
     * @throws ReflectionException
     */
    public static function main()
    {
        $application = new GoApplication();
        $application->addPlug(new RequestTracingPlugin());
        $application->addPlug(new DBTracingPlugin());
        $application->addPlug(new MethodTracingPlugin());
        $application->addPlug(new HttpClientTracingPlugin());
        $application->addPlug(new DingPlugin());
        $application->run(Application::class);
    }

    public function __construct(FilterManager $filterManager)
    {
        $corsConfig = new CorsConfig();
        $corsConfig->setAllowOrigin("*");
        $corsConfig->setAllowMethods("*");
        $filterManager->addFilter(new CorsFilter($corsConfig));
    }
}
