<?php
/**
 * ClassDescription
 * @author qap <qiuapeng921@163.com>
 * @link http://127.0.0.1:8000/index
 * @Date 19-6-18 上午11:26
 */

namespace app\Task;

use ESD\Core\Plugins\Logger\GetLogger;
use ESD\Plugins\AnnotationsScan\Annotation\Component;
use ESD\Plugins\Scheduled\Annotation\Scheduled;

/**
 * @Component()
 * Class TestScheduledTask
 * @package ESD\Plugins\Scheduled\ExampleClass
 */
class TestScheduledTask
{
    use GetLogger;

    public function test()
    {
        $this->info("这是一次定时调用");
    }

    public function dynamic()
    {
        $this->info("这是一次dynamic定时调用");
    }

//    /**
//     * @Scheduled(cron="* * * * * *")
//     */
    public function ann()
    {
        $this->info("这是一次注解定时调用");
    }
}
