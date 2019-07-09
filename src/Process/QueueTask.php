<?php
/**
 * ClassDescription
 * @author qap <qiuapeng921@163.com>
 * @link http://127.0.0.1:8000/index
 * @Date 19-6-18 上午11:16
 */

namespace app\Process;

use ESD\Core\Plugins\Logger\GetLogger;
use ESD\Go\GoProcess;
use ESD\Plugins\Redis\GetRedis;
use ESD\Plugins\Redis\RedisException;

class QueueTask extends GoProcess
{
    use GetLogger, GetRedis;

    /**
     * onProcessStart
     *
     * @return void
     *
     * @throws RedisException
     */
    public function onProcessStart()
    {
        while(true){
            $data = $this->redis()->rPop('test');
            if($data){
                $this->info('redis' . $data);
            }
        }
    }
}
